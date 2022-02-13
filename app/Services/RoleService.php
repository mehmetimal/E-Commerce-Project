<?php


namespace App\Services;


use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
class RoleService
{
public  function getRoles(){
    return Role::all();
}


public  function getRole($role_id){
    return Role::with('permissions')->findOrFail($role_id);
}

public  function storeRole(Request $request){
    Role::create([
       'name'=>$request->name,
    ]);
}
public function updateRole(Request $request,$role_id){
   $role = Role::findOrFail($role_id);

    $role->syncPermissions($request->permissions);
}

}
