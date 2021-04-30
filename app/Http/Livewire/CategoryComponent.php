<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    //create propereties
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug) {
        $this->sorting          = 'default';
        $this->pagesize         = 9;
        $this->category_slug    = $category_slug;
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
        //define a category
        $category       = Category::where('slug', $this->category_slug)->first();
        $category_id    = $category->id;
        $category_name  = $category->name;

        //product sorting
        if ($this->sorting == 'date') :
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);

        elseif ($this->sorting == 'price-asc' ) :
            $products = Product::where('category_id', $category_id)->orderBy('price', 'ASC')->paginate($this->pagesize);

        elseif ($this->sorting == 'price-desc') :
            $products = Product::where('category_id', $category_id)->orderBy('price', 'DESC')->paginate($this->pagesize);
        
        else :
            $products = Product::where('category_id', $category_id)->paginate($this->pagesize);
        
        endif; 

        //filtered by category
        $categories     = Category::all();

        return view('livewire.category-component',[
            'products'      => $products,
            'categories'    => $categories,
            'category_name' => $category_name,
        ])->layout('layouts.base');
    }
}
