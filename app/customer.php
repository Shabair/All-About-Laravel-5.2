<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{

    //protected $table = 'customers_list';
    //if you dont give $table then laravel auto pick the (customer + s) from DB
    
    //by default laravel pick the id colume from the table if you want to change it then
    //protected $primaryKey = 'customer_id';

    //laravel by default store timestamps on agains each record
    //to stop it
    public $timestamps = false;
    //you can also change the formate of timestamp

    protected $guarded = ['is_admin'];
    //this is restric fields to entry in DB in case of MASS Storage
    //and allow all other fields to enter
    /* 
    $customer = new customer_model([
        'name'=> 'shabair',
        'address'=>'fateh garh',
        'phone'=> '+923320872000'
    ]);
        $customer->save();
    */


    //this is also belong to above case the diff is only that it allows only given fields
    protected $fillable = ['name','address','phone'];


}
