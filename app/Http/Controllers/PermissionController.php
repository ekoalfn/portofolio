<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:permission-list', ['only' => ['index']]);
        $this->middleware('permission:permission-view', ['only' => ['index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.permission.index');
    }

    public function data()
    {
        $permission = Permission::orderBy('id', 'desc')->get();
        $user = auth()->user();

        return datatables()
            ->of($permission)
            ->addIndexColumn()
            ->addColumn('published', function ($permission) {
                if ($permission->published == '1'){
                    return '<span class="badge bg-success">' . 'YES' . '</span>';
                } else {
                    return '<span class="badge bg-danger">' . 'NO' . '</span>';
                }
            })
            ->addColumn('aksi', function($permission) use ($user) {
                $btn = '';
            
                // if ($user->can('setting-edit')){
                    $btn = '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group" role="group">
                    <button onclick="editForm(`' . route('permission.update', $permission->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>';
                // }
                // if ($user->can('setting-delete')){
                    $btn = $btn.'<button onclick="deleteData(`' . route('permission.destroy', $permission->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>';

                // }
                return $btn;
            })
            ->rawColumns(['aksi', 'published'])
            ->make(true);
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
            'name'   => 'required',
        ]);

        $category = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        if ($category) {
            return back()->with('success', 'Data created successfully!');
        }

        // return failed with Api Resource
        return redirect()->route('permission.index')->with('error', 'Data failed to save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);

        return response()->json($permission);
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
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->update();
        return redirect()->route('permission.index')->with('success', 'Data Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return response(null, 204);
    }
}
