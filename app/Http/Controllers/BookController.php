<?php

namespace App\Http\Controllers;

use App\Services\GoogleBooksService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function __invoke(Request $request,GoogleBooksService $googleBooksService)
    {

        $search = $request->busca ?? "a";
        $books = $googleBooksService->index($search)->items;
        return view('dashboard', compact('books'));
    }

    public function favorites(Request $request)
    {
        return view('favorites');
    }
}
