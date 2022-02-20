<?php

namespace App\Http\Controllers;

use App\Http\Requests\permission\StorePermissionRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionService ;



    public  function __construct()
    {
        $this->middleware('permission:Read Permission')->only('index', 'show');

        $this->middleware('permission:Create Permission')->only('create','store');

        $this->middleware('permission:Update Permission')->only('update','edit');

        $this->middleware('permission:Delete Permission')->only('destroy');

        $this->permissionService=new PermissionService();
    }

    /**
     * @return PermissionService
     */
    public function getPermissionService(): PermissionService
    {
        return $this->permissionService;
    }

    public function index()
    {
        $permissions = $this->getPermissionService()->getAllPermissions();

        return view('backend.user.permission.index')->with([
           'permissions'=>$permissions
        ]);
    }

    public function create()
    {
        return view('backend.user.permission.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $this->getPermissionService()->storePermission($request->name);
        return back()->with([
            'message'=>'İzin Basarıyla Eklendi'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
