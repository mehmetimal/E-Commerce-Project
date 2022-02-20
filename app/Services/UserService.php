<?php


namespace App\Services;


use App\Models\User;

class UserService
{



    public  function getAllUsers(){
        return User::with('roles','detail')->get();
    }
    public  function getAllShops(){
        return User::role('Shop')->get();
    }
}
