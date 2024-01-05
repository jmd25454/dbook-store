<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use App\Services\GoogleBooksService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function __invoke(Request $request, GoogleBooksService $googleBooksService, Book $book)
    {
        $search = $request->busca ?? "a";
        $books = Cache::get("books_{$search}", function () use ($googleBooksService, $search) {
            return $googleBooksService->index($search)->items;
        }, now()->addMinutes(10));

        $favorites = array_column($book->userBooks(), 'book_id');

        return view('dashboard', compact('books', 'favorites'));
    }

    public function favorites(GoogleBooksService $googleBooksService, Book $book)
    {
        $bookInfo = array_map(function($book) use ($googleBooksService){
            return $googleBooksService->getBookByID($book['book_id']);
        },$book->userBooks());

        return view('favorites', compact('bookInfo'));
    }

    public function addFavoriteBook(string $bookId)
    {
        $userId = auth()->user()->id;
        Book::create([
            'user_id' => $userId,
            'book_id' => $bookId,
        ]);

        return redirect()->route('dashboard');
    }

    public function removeFavoriteBook(string $bookId, BookService $bookService)
    {

        $result = $bookService->removeFavoriteBook($bookId, auth()->user()->id);

        if(!$result){
            return redirect()->route('dashboard')->with('error', 'Livro favorito nao encontrado');
        }

        return redirect()->route('dashboard')->with('success', 'livro removido dos favorito com sucesso');

    }
}
