<?php


namespace App\Services;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionService
{

    public  function getAllPermissions(){
        return Permission::all();
    }

    public  function storePermission($name){
        Permission::create([
            'name'=>$name
        ]);
    }


}
