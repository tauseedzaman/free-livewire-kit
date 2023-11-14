<?php

use App\Livewire\CRUDWithModal;
use App\Livewire\MutliStepForm;
use App\Livewire\Post;
use Illuminate\Support\Facades\Route;


// Route::get('/',  Post::class);
// Route::get('/',  MutliStepForm::class);
Route::get('/',  CRUDWithModal::class);
