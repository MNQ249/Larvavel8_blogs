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

    $path = __DIR__ . "/../resources/posts/{$slug}.html"; // check if url ok


    if (! file_exists($path)){ // if url not ok
//        return redirect('/');
//        dd('file does not exist'); // day dump // kill execution
//        ddd('sorry! wrong way'); // same before but with UI

        abort(404);
    }

//     $post = cache()->remember("posts.{$slug}", 5, function () use ($path){
//       $post = cache()->remember("posts.{$slug}", now()->addMinute(10), function() use ($path){
    
         var_dump('file_get_contents'); // this show if not in the cache
       return file_get_contents($path); // fetch
    });


    return view ('post', [
            'post' => $post // passing to view //this easy way to call routes to view it
        ]);
}); //->where('post', '[A-z_\+]'); // ->whereAlpha('post'); // Route wildcard constraints
