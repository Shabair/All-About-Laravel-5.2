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
        ]);
        // if we want to more item to add
        $customer->phone = '+925464341684313';
        // also its dont with the fill
        $customer->fill([
            'address'=>'fateh garh'
        ]);
        $customer->save();

        echo $customer->id;

        dd($customer);
    }
}
