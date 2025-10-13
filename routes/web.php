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
    // $posts = Post::with(['author', 'category'])->latest()->get();
    $posts = Post::latest();

    if(request('search')) {
        $posts->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    return view('services', ['title' => 'Service Page', 'posts' => $posts->get()]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Me']);
});

Route::get('/article/{post:slug}', function (Post $post) {

    return view('article', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {

    // $posts = $user->posts->load('author', 'category');
    
    return view('services', ['title' => count($user->posts) . ' Article By. ' .  $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    // $posts = $category->posts->load('author', 'category');
    
    return view('services', ['title' => count($category->posts) . ' Article With. ' .  $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'About Page']);
});
