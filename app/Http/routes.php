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

//give route name via as
Route::get('nameviaas',[
    'as' => 'routename3', //give the url name
    'uses' => 'AdminController@index2' //target the controller
    /* insted of uses we can use clouser function directly like 
    
        Route::get('nameviaas',[
                'as' => 'routename3',
                function(){
                    echo 'in the function';
                }
            ]);
    
    */
]);

Route::get('checknameviaas',function(){
    echo route('routename3');
    //this will add ? before parameter and get parameters
});

//Apply Middleware on single url
Route::get('middlewareonur1',[
    'as' => 'middlewareonur_namel',
    'uses' => 'AdminController@index2',
    'middleware' => 'web'

]);

//Apply Middleware on multiple urls via Route::group
// this is because if we want to apply authentications etc
Route::group(['middleware'=>'web'],function(){

    Route::get('middleware_in_route_group',function(){
        echo 'Middleware in route group Thanks';
    });

});

// add prefix for group to prefix route name
//this is because whenever you call the get from a specific group then 
//add prefix in route() before name of that get function
Route::group(['middleware'=>'web','as'=>'admin-'],function(){

    Route::get('use_prefix_for_group',function(){
        echo route('admin-dashboard1');
        //http://localhost/lara/public/use_prefix_for_group
    })->name('dashboard1');

});

// add prefix url in group
//add prefix brfore url
//new url will be http://localhost/lara/public/user/use_prefix_for_route
Route::group(['prefix'=>'user'],function(){

    Route::get('use_prefix_for_route',function(){
        echo route('dashboard2');
        //http://localhost/lara/public/user/use_prefix_for_route
    })->name('dashboard2');

});


//nested route group

Route::group(['prefix'=>'people'],function(){
    Route::group(['prefix'=>'subscribers'],function(){
        //new url will be http://localhost/lara/public/people/subscribers/add
        Route::get('add',function(){
            echo 'add subscribers';
        });

        //new url will be http://localhost/lara/public/people/subscribers/delete    
        Route::get('delete',function(){
            echo 'delete subscribers';
        });

    });

});
