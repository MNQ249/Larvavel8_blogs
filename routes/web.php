<?php

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
    return view('posts');
//    return "Hello  world";

//    return ["foo" => 'bar'];
});


Route:: get('/posts/{post}', function ($slug){

    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (! file_exists($path)){
//        return redirect('/');
//        dd('file does not exist'); // day dump // kill execution
//        ddd('sorry! wrong way'); // same before but with UI

        abort(404);
    }

    $post = file_get_contents($path);

    return view ('post', [
            'post' => $post //this easy way to call routes to view it
        ]);
});
