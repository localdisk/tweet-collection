<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::livewire('/', 'url-input')->name('home');
Route::livewire('/tweets', 'tweets')->name('tweets.index');
Route::livewire('/tags/{tag:name}', 'tags')->name('tags.index');

// Route::get('/tags/{tag}', function (Tag $tag) {
//     dd($tag);
// })->name('tags');
// Route::livewire('/tags/{tag}', 'tags')->name('tags.index');
// Route::livewire('tags', 'tags');
// Route::post('/tweets');
// Route::get('/', function () {
//     return view('index');
// });
