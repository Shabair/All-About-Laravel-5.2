<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    function index($num,$sec=''){
        echo 'In the admin Class and index function :'.$num." second var: ".$sec;
    }

    
    function postmethod(){
        echo 'get post data here';
    }
}
