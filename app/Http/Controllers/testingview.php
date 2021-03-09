<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class testingview extends Controller
{
    function index(){

        $content =  "this is the content of the blog";
        return view('view-testings',compact('content'));
        //also use . instead of / like this will load master view in layout/master.blade.php
        return view('layout.master');

    }

    function override(){
        return view('child-view',['value_from_controller'=>'from-Controller']);
    }

    function test_each(){
        $data = [
            ['name'=>'Shabair'],
            ['name'=>'Ali'],
            ['name'=>'Shahid'],
        ];
        return view('each-testing')->withNames($data);
    }
}
