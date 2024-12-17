<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:roles-list', ['only' => ['index']]);
        $this->middleware('permission:roles-view', ['only' => ['index']]);
        $this->middleware('permission:roles-create', ['only' => ['create']]);
        $this->middleware('permission:roles-edit', ['only' => ['edit']]);
        $this->middleware('permission:roles-delete', ['only' => ['delete']]);
        $this->middleware('permission:roles-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::when(request()->get('search'), function ($role) {
            $role = $role->where('name', 'like', '%' . request()->get('search') . '%');
        })->orderBy('id', 'ASC')->paginate(10);

        return view('pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id')->all();

        return view('pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);
        $role->syncPermissions($request->permission);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Data saved successfully!');
        }

        // return failed with Api Resource
        return redirect()->route('roles.index')->with('error', 'Data failed to save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('pages.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::pluck('name', 'id')->all();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('pages.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $requestData = $request->all();

        $role = Role::findOrFail($id);
        $role->update($requestData);
        $role->syncPermissions($request->permission);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Role Updated!!');
        }

        // return failed with Api Resource
        return redirect()->route('roles.index')->with('error', 'Role failed to update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $role = Role::destroy($id);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Data has been deleted!!');
        }

        // return failed with Api Resource
        return redirect()->route('roles.index')->with('error', 'Data failed to delete!!');
    }
}
