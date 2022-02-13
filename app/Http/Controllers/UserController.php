<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{


    private $userService;
    public function __construct()
    {
        $this->middleware('permission:Read User')->only('index', 'show');
        $this->middleware('permission:Create User')->only('create','store');
        $this->middleware('permission:Update User')->only('update','edit');
        $this->middleware('permission:Delete User')->only('destroy');

        $this->userService =new UserService();
    }

    /**
     * @return UserService
     */
    public function getUserService(): UserService
    {
        return $this->userService;
    }
    public function index()
    {
        $users = $this->getUserService()->getAllUsers();
        return  view('backend.user.index')->with([
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user =User::with('detail','roles')->findOrFail($id);
        $roles = Role::all();
        return view('backend.user.edit')->with([
            'roles'=>$roles,
            'user'=>$user
        ]);
    }


    public function update(Request $request, $id)
    {
       $user = User::with('detail')->findOrFail($id);


       $user->detail()->update([
           'name'=>$request->name,
           'surname'=>$request->surname,
           'phone'=>$request->phone,
       ]);
        $user->syncRoles ($request->role_id);

        return  back()->with([
            'message'=>'OK'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
