<?php

namespace App\Http\Livewire\Admin\Post;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class EditPostComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $image;
    public $newImage;
    // public $post;

    public function mount(Post $post) {

        $this->title = $post->title;
        $this->body  = $post->body;
        // $this->image = $post->image;
        $this->newImage = $post->image;
    }

    public function updatePost() {
        $this->validate([
            'title' =>  'required|max:200',
            'body'  =>  'required',
            'image' =>  'image|max:1024',
        ]);

        $image_name             = $this->newImage->getClientOriginalName();
        $this->newImage->storeAs('photos', $image_name, 'public');

        Post::update([
            'title'     =>  $this->title,
            'body'      =>  $this->body,
            'image'     =>  $image_name,
            'slug'      =>  Str::slug($this->title),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.post.edit-post-component');
    }
}
