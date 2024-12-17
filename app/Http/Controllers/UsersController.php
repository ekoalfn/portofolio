<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth, DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:users-list', ['only' => ['index']]);
    //     $this->middleware('permission:users-view', ['only' => ['index']]);
    //     $this->middleware('permission:users-create', ['only' => ['create']]);
    //     $this->middleware('permission:users-edit', ['only' => ['edit']]);
    //     $this->middleware('permission:users-delete', ['only' => ['delete']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Carbon::now());
        $roles = Role::select('id', 'name')->get();
        $list_role = $roles->pluck('name', 'id');

        $users = User::when(request()->get('search'), function ($role) {
            $roles = $role->where('email', 'like', '%' . request()->get('search') . '%');
        })->latest()->paginate(10);

        return view('pages.users.index');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handelProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'email_verified_at' => now(),
            'type' => 'user',
        ];
        
        // firstOrCreate digunakan apabila sudah ada email yang sama maka tidak perlu melakukan create ulang
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        $user->assignRole('user');
        Auth::login($user, true);

        return redirect(route('home'));
    }

    public function data()
    {
        $users = User::get();
        $user = auth()->user();

        return datatables()
            ->of($users)
            ->addIndexColumn()
            ->addColumn('email_verified_at', function ($users) {
                if(!isset($users->email_verified_at)) {
                    return '<span class="badge bg-danger"> Not Actived </span>';
                } else{
                    return date('d-m-Y', strtotime($users->email_verified_at));
                }
            })
            ->addColumn('role', function ($users) {
                return '<span class="badge bg-info">' . preg_replace("/[^a-zA-Z]/", "", $users->getRoleNames()) . '</span>';
            })
            ->addColumn('aksi', function ($users) use ($user) {
                $btn = '';
                // if ($users->can('users-change-password')) {
                //     $btn = '<li><button class="dropdown-item" onclick="edit(`' . $users->id . '`)">Change Password</button></li>';
                // }
                // if ($users->can('users-set-active')) {
                //     $btn = '<li><a class="dropdown-item" href="' . route('users.activity', $users->id) . '">Non Actiavate</a></li>';
                // }
                // return $btn;
                if ($users->id == 1) {
                    
                    return '
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="' . route('users.edit', $users->id) . '">Edit</a></li>
                                <li><button class="dropdown-item" onclick="edit(`' . $users->id . '`)">Change Password</button></li>                            
                            </ul>
                        </div>
                        ';
                }
                else {
                    if ($users->password == null) {
                        return '
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="' . route('users.edit', $users->id) . '">Edit</a></li>
                                    <li><button class="dropdown-item" onclick="deleteData(`' . route('users.destroy', $users->id) . '`)">Delete</button></li>                            
                                </ul>
                            </div>
                            ';
                    } else {
                        if ($users->email_verified_at != null) {
                            return '
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="' . route('users.edit', $users->id) . '">Edit</a></li>
                                        <li><button class="dropdown-item" onclick="deleteData(`' . route('users.destroy', $users->id) . '`)">Delete</button></li>                            
                                        <li><button class="dropdown-item" onclick="edit(`' . $users->id . '`)">Change Password</button></li>                            
                                        <li><a class="dropdown-item" href="' . route('users.activity', $users->id) . '">Non Actiavate</a></li>
                                    </ul>
                                </div>
                                ';
                        } else {
                            return '
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="' . route('users.edit', $users->id) . '">Edit</a></li>
                                        <li><button class="dropdown-item" onclick="deleteData(`' . route('users.destroy', $users->id) . '`)">Delete</button></li>                            
                                        <li><button class="dropdown-item" onclick="edit(`' . $users->id . '`)">Change Password</button></li>                            
                                        <li><a class="dropdown-item" href="' . route('users.activity', $users->id) . '">Actiavate</a></li>
                                    </ul>
                                </div>
                                ';
                        }
                        
                    }
                }
                return $btn;
            })
            ->rawColumns(['aksi', 'email_verified_at', 'role'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        $list_role = $roles->pluck('name', 'id');

        return view('pages.users.create', compact('list_role'));
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
            'name'  => 'required',
            'email'     => 'required|string|max:255|email|unique:users',
            'password'  => 'required',
            'phone_number'  => 'required',
            'roles'     => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->email_verified_at = now();
        if ($request->roles[0] == 1) {
            $user->type = 'admin';
        }else {
            $user->type = 'user';
        }
        $user->save();
        $user->assignRole($request->roles);

        if ($user) {
            return redirect()->route('users.index')->with('success', 'Data created successfully!');
        }

        // return failed with Api Resource
        return redirect()->route('users.index')->with('error', 'Data failed to save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->select('id', 'name', 'email', 'phone_number')->findOrFail($id);
        $list_role = Role::pluck('name', 'id')->all();

        $user_roles = $user->roles->pluck('id', 'id')->all();

        return view('pages.users.edit', compact('user', 'list_role', 'user_roles'));
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
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email'   => 'required|string|max:255|email',
            'phone_number'  => 'required',
            'roles'   => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        if ($request->roles[0] == 1) {
            $user->type = 'admin';
        }else {
            $user->type = 'user';
        }
        $user->update();
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        if ($user) {

            return redirect()->route('users.index')->with('success', 'Data has been updated!!');
        }

        // return failed with Api Resource
        return redirect()->route('users.index')->with('error', 'Data failed to update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password($id)
    {
        $user = User::find($id);
        // dd($user);

        return view(
            'pages.users.resetpwd',
            compact('user')
        );
    }

    /**
     * Reset password from admin to user, used for help user to reset password
     * 
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function resetpwd(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $user = User::find($id);
        $user->password = bcrypt(request('password'));
        $user->save();

        if ($user) {
            // return success with API Resourec
            return back()->with('success', 'Successfully Change Password');
        }

        // return failed with Api Resource
        return redirect()->route('users.index')->with('error', 'Failed to Change Password');
    }

    public function change_password($id)
    {   
        $company  = User::find($id);
        return Response()->json($company);
    }

    public function post_change_password(Request $request)
    {
        $rules =array(
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
        );

        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(["status"=>"error","message"=>$errors[0]], 200);
        }
        $user = User::find($request->id);
        $user->password = bcrypt(request('password'));
        $user->save();
    
        return response()->json(["status"=>"success","message"=>'Password has been updated!'], 200);
    }

    public function activity($id){
        $user = User::find($id);
        if ($user->email_verified_at != null) {
            $user->email_verified_at = null;
        }else {
            $user->email_verified_at = Carbon::now();
        }
        $user->update();
        return back()->with('success', 'User has been activated');
    }

    public function login_admin()
    {
        if(!empty(Auth::user())){
            return redirect()->route('admin.home');
        }else {
            return view('auth.loginAdmin');
        }
    }

    public function loginAs(Request $request, $id)
    {
        $userRoles = Auth::user()->getRoleNames()->toArray();
        if(in_array('admin', $userRoles)) 
        {
            //login the user
            $user = User::find($id);
            if(Auth::user()->id != $id)
            {
                Auth::loginUsingId($id);
                return response()->json(["status"=>"success","message"=>'Login Success, Please Wait!'], 200);
            }
            else
            {
                return response()->json(["status"=>"danger","message"=>'You already logged in!'], 200);
            }
        }
        else
        {
            return response()->json(["status"=>"danger","message"=>'You Are NOT Admin!'], 200);
        }
    }

    public function add_role(Request $request)
    {
        $rules =array(
            'role' => 'required',
        );

        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(["status"=>"error","message"=>$errors[0]], 200);
        }
        $user = User::findOrFail($request->user_id);
        $role = Role::where('id', $request->role)->first();
        $user->assignRole($role->name);
        return response()->json(["status"=>"success","message"=>'Successfully Added Role'], 200);
    }
}
