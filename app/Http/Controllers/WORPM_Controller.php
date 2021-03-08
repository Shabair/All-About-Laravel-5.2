<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WORPM_Controller extends Controller
{
    //


    function __construct(){
        $this->middleware('WORPM_middleware_shortName',[
            //apply middleware only on these methods
            'only' => 'getCheckMiddleware',
            //to apply middleware on multy methods
            //'only' => ['getCheckMiddleware'],

            //apply middleware on all methods except these methods onece
            'except' => 'getCheckMethodWithExceptMiddleWare',
        ]);
        // for more then one middlewares
        //         $this->middleware(['web','WORPM_middleware_shortName']);

    }



    //hit this url http://localhost/lara/with_out_routes_plus_middleware/check-middleware
    // and check storage/logs/laravel.log
    public function getCheckMiddleware(){
        echo 'in the getCheckMiddleware';
    }

        

    //hit this url http://localhost/lara/with_out_routes_plus_middleware/check-method-with-except-middle-ware
    // and check storage/logs/laravel.log
    public function getCheckMethodWithExceptMiddleWare(){
        echo 'in the getCheckMethodWithExceptMiddleWare';
    }
}
