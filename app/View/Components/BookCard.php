<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookCard extends Component
{

    public string $thumbnail;
    public string $title;
    public bool $clicked;
    public string $bookId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $thumbnail = '', string $title = '', bool $clicked = false, string $bookId = '')
    {
        $this->thumbnail = !empty($thumbnail) ? str_replace('amp;', '', $thumbnail) : 'http://localhost/storage/book-image/book-image-not-available.png';
        $this->title = $title;
        $this->clicked = $clicked;
        $this->bookId = $bookId;
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
