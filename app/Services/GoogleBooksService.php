<?php

namespace App\Services;

use GuzzleHttp\Client;


class GoogleBooksService{

    private Client $client;
    private string $path = 'books/v1/volumes';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.googleapis.com'
        ]);
    }

    public function index(string $book)
    {
        $response = $this->client->request("GET", "{$this->path}", [
            "query" => [
                "q" => $book,
                "key" => env("GOOGLE_BOOK_KEY")
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }
}
