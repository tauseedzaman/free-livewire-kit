<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use Illuminate\Support\Str;

class Post extends Component
{
    public $title;
    public $slug;
    public $posts;

    protected $rules = [
        'title' => 'required|max:100',
        'slug' => 'required|max:100',
    ];

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $this->validate();

        $post=ModelsPost::create([
            'title'=>$this->title,
            'slug'=>$this->slug
        ]);
        $this->title = '';
        $this->slug = '';
    }
    public function render()
    {
        $this->posts=ModelsPost::latest('id')->take(5)->get();
        return view('livewire.post');
    }
}
