<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    //create propereties
    public $sorting;
    public $pagesize;

    public function mount() {
        $this->sorting  = 'default';
        $this->pagesize = 9;
    }

    
    //Add to Shopping Cart
    public function store($product_id, $product_name, $product_price) {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product-cart');
    }
    
    use WithPagination; // limit the results to x post(s) per page

    public function render()
    {   

        //product sorting
        if ($this->sorting == 'date') :
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);

        elseif ($this->sorting == 'price-asc' ) :
            $products = Product::orderBy('price', 'ASC')->paginate($this->pagesize);

        elseif ($this->sorting == 'price-desc') :
            $products = Product::orderBy('price', 'DESC')->paginate($this->pagesize);
        
        else :
            $products = Product::paginate($this->pagesize);
        
        endif; 

        //filtered by category
        $categories = Category::all();

        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => $categories,
        ])->layout('layouts.base');
    }



}
