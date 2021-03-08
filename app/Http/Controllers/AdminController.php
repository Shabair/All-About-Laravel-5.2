<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    function index($num){
        echo 'In the admin Class and index function :'.$num;
    }

    
    function postmethod(){
        echo 'get post data here';
    }
}
