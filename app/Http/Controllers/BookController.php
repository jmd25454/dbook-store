<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\GoogleBooksService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function __invoke(Request $request, GoogleBooksService $googleBooksService)
    {
        $search = $request->busca ?? "a";

        $books = Cache::get("books_{$search}", function() use ($googleBooksService, $search){
            return $googleBooksService->index($search)->items;
        }, now()->addMinutes(10));

        $clicked = false;
        return view('dashboard', compact('books','clicked'));
    }

    public function favorites(Request $request)
    {
        return view('favorites');
    }

    public function addFavoriteBook(string $book_id = '')
    {
        $user_id = auth()->user()->id;
        Book::create([
            'book_id' => $book_id,
            'user_id' => $user_id,
        ]);
        return "Adicionado";
    }

    public function getFavoriteBooks(GoogleBooksService $googleBooksService)
    {
        $user_id = auth()->user()->id;
        $favoriteBooks = Book::where([
            'user_id' => $user_id
        ]);

        return $googleBooksService->getBookByID($favoriteBooks);
    }
}
