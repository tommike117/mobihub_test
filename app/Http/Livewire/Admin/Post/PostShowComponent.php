<?php

namespace App\Http\Livewire\Admin\Post;

use Livewire\Component;
use App\Models\Post;

/**
 * To show post
 */
class PostShowComponent extends Component
{
    //livewire property
    public $post;

    public function mount($slug) {
        $this->post = Post::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.admin.post.post-show-component');
    }
}
