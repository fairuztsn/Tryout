<?php

use App\Models\Song;
use App\Http\Controllers\SongController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $song = Song::all();
    return view('dashboard', [
        "song"=>$song
    ]);
})->middleware(['auth'])->name('dashboard');

Route::resource('song', SongController::class);

Route::get('/my-playlist', function() {
    return view("my-playlist");
})->name('my-playlist');

Route::get('song/{id}/detail', function($id) {

    $song = Song::find($id);

    return view('song-detail', [
        "song" => $song
    ]);
    // return $song;
});

Route::get('upload',     [SongController::class, 'create'])->name("upload");

Route::post('upload',    [SongController::class, 'store'])->name("upload");

require __DIR__.'/auth.php';
