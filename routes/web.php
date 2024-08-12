<?php

use Illuminate\Support\Facades\Route;
use Psy\VersionUpdater\Downloader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Response;


Route::get('/register', function() {
    return view('Download');
});

Route::get('/login', function() {
    $path = public_path('resources/views/Download.php');
    $content = file_get_contents($path);
    return Response::make($content, 200, ['Content-Type' => 'text/html']);
});
