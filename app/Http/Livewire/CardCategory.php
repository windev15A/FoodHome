<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CardCategory extends Component
{

    public $category;

    public function render()
    {
        return view('livewire.card-category');
    }
}
