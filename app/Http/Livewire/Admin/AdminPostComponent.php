<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class AdminPostComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-post-component', [
            'posts' =>  Post::orderBy('created_at', 'DESC')->get() //order by latest post.
        ]);
    }
}
