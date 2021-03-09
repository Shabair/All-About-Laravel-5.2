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

        //another method to insert data
        $customer = customer_model::create([
            'name'=> 'shabair',
            'address'=>'fateh garh',
            'phone'=>'0000000000000'
        ]);

        echo $customer->id;

        dd($customer);
    }

    function find(){
        $customer = customer_model::find(20);
        dd($customer->name);
    }

    function delete($id){
        $customer = customer_model::find($id);
        $customer->delete();
        echo $id." has been delete";
    }

    function destroy($id){
        customer_model::destroy($id);
        echo $id." has been delete";
    }
}
