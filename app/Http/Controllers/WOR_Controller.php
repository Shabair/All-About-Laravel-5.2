<?php

namespace App\Http\Controllers;

class WOR_Controller extends Controller
{
    //get this method via http://localhost/lara/public/with_out_routes/add-user
    function getAddUser(){
        echo 'in the AddUSer';
    }

    // get this method via http://localhost/lara/public/with_out_routes/add-user-with-the-restrictions
    function getAddUserWithTheRestrictions(){
        echo 'in the add-user-with-the-restrictions';
    }

    //post request on this url http://localhost/lara/public/with_out_routes/add-user
    function postAddUser(){
        echo 'in the postUSer';
    }

    //missingMethod is the method of paraten controller class and we are overwriting it here.
    //this method hitted when there is no defined method in the controller 
    //$param = [] must pass as a parameter because its parent form has one array parameter
    // hit this url http://localhost/lara/public/with_out_routes/test/the/missingmethod
    //you can pass unlimited parameters
    function missingMethod( $para = []){
        echo 'in the missing method <br />';
        dd( $para );
    }
}
