<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardProduct extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.card-product');
    }
}
