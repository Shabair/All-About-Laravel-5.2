<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    function index($num,$sec=''){
        echo 'In the admin Class and index function :'.$num." second var: ".$sec;
    }

    
    function index2(){
        echo 'In the admin Class and index function index2';
    }
    
    function postmethod(){
        echo 'get post data here';
    }
}
