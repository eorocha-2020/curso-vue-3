<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
   return User::get();
});

Route::get('/users/search', function (Request $request) {
    $user = $request->input('user');
    return User::where('firstName', 'like', "%{$user}%")->paginate(1);
});


Route::post('/user', function (Request $request) {
    $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required'
    ],[
        'firstName.required' => 'O campo nome é obrigatorio',
        'lastName.required' => 'O campo sobrenome é obrigatorio',
        'email.required' => 'O campo email é obrigatorio',
        'email.unique' => 'Já existe um email com esse valor',
        'password.required' => 'O campo nome é obrigatorio',
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
