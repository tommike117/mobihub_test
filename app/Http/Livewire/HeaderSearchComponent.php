<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_category;
    public $product_category_id;

    public function mount() {
        $this->product_category = 'All Cetegory';
        $this->fill(request()->only('search', 'product_category', 'product_category_id'));
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-search-component', ['categories' => $categories]);
    }
}
