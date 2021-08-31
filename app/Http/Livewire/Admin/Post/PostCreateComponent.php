<?php

namespace App\Http\Livewire\Admin\Post;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PostCreateComponent extends Component
{
    use WithFileUploads;
    //properties
    public $saveSuccess = false;
    public $title;
    public $body;
    public $image = null;

    //store a new post
    public function storePost() {

        
        $this->validate([
            'title' =>  'required|max:200',
            'body'  =>  'required',
            'image' =>  'image|max:1024',
        ]);

            $image_name             = $this->image->getClientOriginalName();
            $this->image->storeAs('photos', $image_name, 'public');
            Post::create([
                // 'image' =>  $image_name,
                'title'     =>  $this->title,
                'body'      =>  $this->body,
                'user_id'   =>  Auth::user()->id,
                'slug'      =>  Str::slug($this->title),
            ]);

            $this->saveSuccess      = true;

    }


    public function render()
    {
        return view('livewire.admin.post.post-create-component');
    }
}
