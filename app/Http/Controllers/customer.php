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


        //to use this you have add fillable or guarded properties into the model
        $customer = new customer_model([
            'name'=> 'shabair',
            'address'=>'fateh garh',
            'phone'=> '+923320872000'
        ]);
        $customer->save();


        dd($customer);
        echo 'in the customer class and index';
    }
}
