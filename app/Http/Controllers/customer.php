<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\customer as customer_model;

class customer extends Controller
{
    function index(){
        $customers = customer_model::all();
        dd($customers);
        echo 'in the customer class and index';
    }
}
