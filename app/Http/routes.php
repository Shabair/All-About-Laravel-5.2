<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/','AdminController@index');


Route::get('/admin/{number}/{second?}','AdminController@index');

Route::get('oppara/{name}/{age?}',function($name,$age=''){
    echo "Name is: ".$name."<br />";
    echo "Age is: ".$age;

});

Route::post('PostData','AdminController@postmethod');