<?php

namespace App\Services;

use App\Models\Book;


class BookService{

    /**
     * Remove o livro do favorito do usuario
     *
     * @param string $bookId
     * @param integer $userId
     * @return boolean
     */
    public function removeFavoriteBook(string $bookId, int $userId):bool
    {
        $books = Book::where([
            'user_id' => $userId,
            'book_id' => $bookId,
        ])->get();

        if(!$books->isNotEmpty()){
            return false;
        }

        foreach($books as $book){
            $book->delete();
        }

        return true;
    }

}
