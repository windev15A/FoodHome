<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\CartItem;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Panier extends Component
{
    public $quantity;
    public $name ;
    public $price;
    public $image;
    public $rowId ;
    protected $listeners = ['addedQte' => 'incrementQte', 'minusQte' => 'decrementQte'];
  
    

    public function mount($product)
    {
        
        $this->quantity = $product->qty;
        $this->name = $product->name;
        $this->price = $product->subTotal();
        $this->rowId = $product->rowId;
        

    }

    public function render()
    {
        
        return view('livewire.panier');
    }

    public function incrementQte($rowId)
    {
        
        if($this->quantity <= 9 || $this->quantity <= 0){
            Cart::update($rowId, $this->quantity+1);
            return  $this->quantity = Cart::get($rowId)->qty;
            // $this->quantity = $cartItem->qte;
            // return $this->quantity;
        }
    }
    public function decrementQte($rowId)
    {
        if ($this->quantity <= 1) {
            return $this->quantity = 1;
        } else {
            return Cart::update($rowId, $this->quantity-1);
            
        }
    }
}
