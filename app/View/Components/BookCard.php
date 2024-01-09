<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookCard extends Component
{

    public string $thumbnail;
    public string $title;
    public bool $clicked;
    public string $bookId;
    public string $description;
    public string $searchInfo;
    public string $saleInfo;
    public string $shop;
    public string $currencyCode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $thumbnail = '', string $title = '', bool $clicked = false, string $bookId = '', string $description = '', string $searchInfo = '', string $saleInfo = '', string $shop = '', string $currencyCode = '')
    {
        $this->thumbnail = !empty($thumbnail) ? str_replace('amp;', '', $thumbnail) : 'http://localhost/storage/book-image/book-image-not-available.png';
        $this->title = $title;
        $this->clicked = $clicked;
        $this->bookId = $bookId;
        $this->description = $description;
        $this->searchInfo = $searchInfo;
        $this->saleInfo = $saleInfo;
        $this->shop = $shop;
        $this->currencyCode = $currencyCode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.book-card');
    }
}
