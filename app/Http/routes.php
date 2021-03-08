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



/*
--------------------------------------------------------------------------
 Check thye artisan command in the cmd, with this we can generate may files like controllers, middlewares etc
    run this command
    "php artisan"
    you can see all command listed there. now run isan route:list
    to check all route defined ithe the route folder
    you can check all types of url or requests via php artisan route:list
--------------------------------------------------------------------------
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

//all other type of requests
/*  
    Route::post();
    Route::delete();
    Route::put();
    Route::patch();
    Route::any();
    Route::match();
    Route::controller();

*/

//any type of request (post, get, put,patch)
//http://localhost/lara/public/any_check
Route::any('any_check',function(){
    echo 'in any route';
});

//match the specific type of route request outof (post, get, put,patch etc)
//http://localhost/lara/public/match_check
Route::match(['get','post'],'match_check',function(){
    echo 'in match route';
});

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

//sub domain concept if we create sub-domains like ali.example.com shabair.example.com
//this will pass ali and shabair as first parameter to the method
Route::group(['domain'=>'{domain}'],function(){

        //new url will be http:shabair.example.com/checksubdomain
        //this will run checksubdomain controller's method dashboard
        Route::get('checksubdomain','checksubdomain@dashboard');

});



//if we dont want to define routes for any controller then we can do this.
/* 
then you define method in the controller like this (function (request type)(with capital letter method name)(){}) e.g function getAddUser 
the url will be http://localhost/lara/public/with_out_routes/add-user
each capital letter seperate via "-"
you can check all urls via php artisan route:list
http://localhost/lara/public/with_out_routes/add-user-with-the-restrictions
http://localhost/lara/public/with_out_routes/add-user

*/
Route::controller('with_out_routes','WOR_Controller');

//**************************************************************all about Routes End*******************************************************************************************all about Routes End
//**************************************************************all about Routes End*******************************************************************************************all about Routes End
//**************************************************************all about Routes End*******************************************************************************************all about Routes End
//**************************************************************all about Routes End*******************************************************************************************all about Routes End
//**************************************************************all about Routes End*******************************************************************************************all about Routes End
//**************************************************************all about Routes End*******************************************************************************************all about Routes End
//**************************************************************all about Routes End*******************************************************************************************all about Routes End



//**************************************************************all about view Start*******************************************************************************************

// hit this url http://localhost/lara/public/getview
Route::get('getview',function(){
    return view('test-view');
});

// pass data in view and hit this url http://localhost/lara/public/getviewwithdata
Route::get('getviewwithdata',function(){
    $data = [
        'ali',
        'shahid',
        'kamran'
    ];
    $name = 'Shabair';
    $age = 26;
    //compact is php function and make array of each passing parameters
    return view('test-data',compact('data','name','age'));

    // or we can do
    return view('test-data',['data'=>$data,'name'=>$name,'age'=>$age]);

    // or we can do with "with" method
    return view('test-data')->with('data',$data)->with('name',$name)->with('age',$age);

    // or we can do with "with" method
    return view('test-data')->with(['data'=>$data,'name'=>$name,'age'=>$age]);

    //or we can pass data via dynamic methods (in this method you have to capital of first letter of varible used in view )
    return view('test-data')->withData($data)->withName($name)->withAge($age);
});

//**************************************************************all about View End*******************************************************************************************
//**************************************************************all about View End*******************************************************************************************
//**************************************************************all about View End*******************************************************************************************
//**************************************************************all about View End*******************************************************************************************
//**************************************************************all about View End*******************************************************************************************




//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^remove public from url^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

/*
move the .htaccess file from the public folder to main directory of the project and rename the serve.php to index.php located in the main directory of laravel project.
so you can access project with out public in the url.
for this must consider that apache rewrite_mode enable

*/


//**************************************************************all about public remove from url*******************************************************************************************
//**************************************************************all about public remove from url*******************************************************************************************
//**************************************************************all about public remove from url*******************************************************************************************
//**************************************************************all about public remove from url*******************************************************************************************
//**************************************************************all about public remove from url*******************************************************************************************



//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^all about middlewares start^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

/*
    you can create middleware via command line or mannualy .
    via command line paste this code "opened in the project directory" in cmd ( php artisan make:middleware middlewareName )
    e.g php artisan make:middleware testingmiddleware
    after creating and before using middleware first register in kernal.php located in app/http/kernal.php 
*/


//hit this url http://localhost/lara/testingmiddleware
Route::get('testingmiddleware',function(){
    echo 'testingmiddleware closure function';
})->middleware('testingmiddleware');

/*
    or you can pass an array of middleware if there are more than one middlewares
    e.g ->middleware(['web,'testingmiddleware']);
    another example of middlewaren use

    Route::get('testingmiddleware',[
        'middleware' => 'testingmiddleware',
        function(){
            echo 'testingmiddleware closure function';
        }
    ]);


*/

//applt middleware on route:controller

Route::controller('with_out_routes_plus_middleware','WORPM_Controller');

//you can also see different methods to use middleware in a controller


//**************************************************************all about middle url End*******************************************************************************************

//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^all about dependency injection^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

//hit this url http://localhost/lara/dependency-check
//get the testingmodel.php object in dependencycheck.php controller
Route::get('dependency-check','dependencyCheck@dashboard');

//**************************************************************end of dependency check*******************************************************************************************





//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^all about view^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


//hit this url http://localhost/lara/testing-view
Route::get('testing-view','testingview@index');

