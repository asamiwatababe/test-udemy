<?php

use Illuminate\Support\Facades\Route;
use App\Models\Greeting;
use App\Models\Person;

Route::get('/', function () {
    return view('welcome');
});

// 文字列を返すルート
Route::get('/simple', function () {
    return 'シンプルな文字列レスポンスです';
});

// viewを返すルート
Route::get('/about', function () {
    return view('about');
});

Route::get('/greeting', function () {
    $greetings = Greeting::with('person')->get();
    return view('greeting', compact('greetings'));
});

Route::post('/greeting', function () {
    $person = Person::create(['name' => request('name')]);
    $person->greetings()->create(['message' => request('message')]);
    return redirect('/greeting');
});

Route::delete('/greeting/{id}', function ($id) {
    Greeting::findOrFail($id)->delete();
    return redirect('/greeting');
});
