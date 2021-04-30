<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    //Quantity adjustment
    public function increseQuantity($rowId) {
        $product    =   Cart::get($rowId);
        $qty        =   $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decreseQuantity($rowId) {
        $product    =   Cart::get($rowId);
        $qty        =   $product->qty - 1;
        Cart::update($rowId, $qty);
    }

    //To remove item from cart
    public function remove($rowId) {
        Cart::remove($rowId);
        Session()->flash('success_message', 'Item has removed');
    }

    //To clear all item in cart
    public function destroyAll() {
        Cart::destroy();
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
