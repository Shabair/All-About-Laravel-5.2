<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\customer as customer_model;

class customer extends Controller
{
    function index(){

        $faker = \Faker\Factory::create();

        
        $customer = new customer_model;
        $customer->name = $faker->name();
        $customer->address = $faker->state();
        $customer->phone = $faker->phoneNumber();
        $customer->save();
        dd($customer);
        echo 'in the customer class and index';
    }
}
