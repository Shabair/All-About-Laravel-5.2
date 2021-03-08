<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class checksubdomain extends Controller
{
    public function dashboard($domain){
        echo $domain;
    }
}
