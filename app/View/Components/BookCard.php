<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookCard extends Component
{

    public string $thumbnail;
    public string $title;
    public string $isbn;
    public bool $clicked;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $thumbnail = '', string $title = '', string $isbn = '', bool $clicked = false)
    {
        $this->thumbnail = !empty($thumbnail) ? str_replace('amp;', '', $thumbnail) : 'http://localhost/storage/book-image/book-image-not-available.png';
        $this->title = $title;
        $this->isbn = $isbn;
        $this->clicked = $clicked;
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
