<?php

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

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

//insert

Route::get('/insert', function () {
    $user = User::findOrFail(1);
    $address = new Address(['name' => '1234 Npj av NP NP 112321']);
    $user->address()->save($address);
});

//update
Route::get('/update', function () {
    $address = Address::whereUserId(1)->first();
    $address->name = '123 Update Av, Alaska';
    $address->save();

});

//read
Route::get('/read', function () {
    $user = User::findOrFail(1);
    return $user->address->name;
});

Route::get('/delete',function(){
   $user  = User::findOrFail(1);
   $user->address()->delete();
});