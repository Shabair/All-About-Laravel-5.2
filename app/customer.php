<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $table = 'customers_list';
    //if you dont give $table then laravel auto pick the (customer + s) from DB
    
    //by default laravel pick the id colume from the table if you want to change it then
    protected $primaryKey = 'customer_id';

    //laravel by default store timestamps on agains each record
    //to stop it
    public $timestamps = false;
    //you can also change the formate of timestamp



}
