<?php

use App\Livewire\Post;
use Illuminate\Support\Facades\Route;


Route::get('/',  Post::class);
