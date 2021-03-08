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

//multi paramters to controller and admin
Route::get('/admin/{number}/{second?}','AdminController@index');

//Passing optional parameter to clouser function
Route::get('oppara/{name}/{age?}',function($name,$age=''){
    echo "Name is: ".$name."<br />";
    echo "Age is: ".$age;

});

//regular expression on url, a check point
Route::get('regex/{name}/{age?}',function($name,$age=''){
    echo "Name is: ".$name."<br />";
    echo "Age is: ".$age;

})->where(['age'=>'[0-9]+','name'=>'^[A-Za-z]+$']);

//post a data
Route::post('PostData','AdminController@postmethod');

//Check Url Function
Route::get('checkurl',function(){
    echo url('admin',[125]);
});

//Give a name to a route
Route::get('regex2/check/{name}/{age?}',function($name,$age=''){
    echo "Name is: ".$name."<br />";
    echo "Age is: ".$age;

})->where(['age'=>'[0-9]+','name'=>'^[A-Za-z]+$'])->name('rg');

Route::get('checkroutename',function(){
    echo route('rg',['shaib',125]);
});

//Give a name to a route and pass random values
Route::get('regex3/check/',function(){
    echo 'Url is Working';
})->name('rg2');

Route::get('checkroutename2',function(){
    echo route('rg2',['sortby'=>'name','shaib',125]);
    //this will add ? before parameter and get parameters
});
