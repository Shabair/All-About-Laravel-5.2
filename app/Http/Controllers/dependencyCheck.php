<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\testingmodel as test;

use App\Http\Requests;

class dependencyCheck extends Controller
{
    function __construct( test $test){
       
        dd($test);

    }

    function dashboard(){

    }
}
