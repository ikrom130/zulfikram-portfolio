<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/home', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/services', function () {
    $posts = Post::latest()
        ->filter(request(['search', 'category', 'author']))
        ->paginate(5)
        ->withQueryString();

    return view('services', ['title' => 'Service Page', 'posts' => $posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Me']);
});

Route::get('/article/{post:slug}', function (Post $post) {

    return view('article', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'About Page']);
});
