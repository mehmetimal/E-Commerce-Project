<?php

namespace App\Http\Controllers;

use App\Http\Requests\role\StoreRoleRequest;
use App\Http\Requests\role\UpdateRoleRequest;
use App\Services\PermissionService;
use App\Services\RoleService;
use http\Message;
use Illuminate\Http\Request;

class RoleController extends Controller
{


    private $roleService;
    public  function __construct()
    {
        $this->middleware('permission:Read Role')->only('index', 'show');

        $this->middleware('permission:Create Role')->only('create','store');

        $this->middleware('permission:Update Role')->only('update','edit');

        $this->middleware('permission:Delete Role')->only('destroy');

        $this->roleService=new RoleService();
    }

    /**
     * @return RoleService
     */
    public function getRoleService(): RoleService
    {
        return $this->roleService;
    }

    public function index()
    {
        $roles = $this->getRoleService()->getRoles();

        return view('backend.user.role.index')->with([
           'roles'=>$roles,
        ]);

    }

    public function create()
    {
        return view('backend.user.role.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $this->getRoleService()->storeRole($request->name);

        return back()->with([
            'message'=>'Role Basarılı Bir sekilde Eklendi !'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(PermissionService $permissionService,$role_id)
    {


        $role=$this->getRoleService()->getRole($role_id);
        $permissions = $permissionService->getAllPermissions();

        return view('backend.user.role.edit')->with([
            'role'=>$role,
            'permissions'=>$permissions
        ]);
    }

    public function update(UpdateRoleRequest $request, $role_id)
    {
        $this->getRoleService()->updateRole($request->permissions,$role_id);
        return back()->with([
            'message'=>'Rol Guncellendi !',
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
