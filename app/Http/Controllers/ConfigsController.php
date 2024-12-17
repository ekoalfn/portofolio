<?php

namespace App\Http\Controllers;

use App\Models\Configs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ConfigsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:setting-config', ['only' => ['index']]);
    }

    public function index()
    {
        return view('pages.config.index');
    }

    public function data()
    {
        $config = Configs::orderBy('id', 'desc')->get();
        return datatables()
            ->of($config)
            ->addIndexColumn()
            ->addColumn('value', function ($config) {
                return Str::limit($config->value, 30, '...');
            })
            ->addColumn('aksi', function ($config) {
                return '
                <div class="btn-group">
                    <button onClick="edit('.$config->id.')" class="btn btn-sm btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`' . route('config.destroy', $config->id) . '`)" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'published'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $rules =array(
            'key' => 'required',
            'value'   => 'required',
        );

        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(["status"=>"error","message"=>$errors[0]], 200);
        }

        $config = Configs::create([
            'key' => $request->key,
            'value' => $request->value,
        ]);

        if ($config) {
            return response()->json(["status"=>"success","message"=>'Data Config Added!'], 200);
        }
    }

    public function edit($id)
    {   
        $config  = Configs::find($id);
        return Response()->json($config);
    }

    public function update(Request $request, $id)
    {
        $rules =array(
            'key' => 'required',
            'value'   => 'required',
        );

        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(["status"=>"error","message"=>$errors[0]], 200);
        }
        
        $config = Configs::find($id);
        $config->key = $request->key;
        $config->value = $request->value;
        $config->update();

        return response()->json(["status"=>"success","message"=>'Data Config Updated!'], 200);
    }

    public function destroy($id)
    {
        $config = Configs::find($id);
        $config->delete();

        return response(null, 204);
    }

    public function index_mail()
    {
        return view('admin.settings.mail');
    }
    public function index_general()
    {
        return view('admin.settings.general');
    }

    public function store_mail(Request $request){

        $rules =array(
            'mail_name' => 'required',
            'mail_address' => 'required',
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required'
        );
        
        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return redirect()->back();
        }
        Configs::where('key','mail.from.name')->update(['value' => $request->mail_name]);
        Configs::where('key','mail.from.address')->update(['value' => $request->mail_address]);
        Configs::where('key','mail.default')->update(['value' => $request->mail_driver]);
        Configs::where('key','mail.mailers.smtp.host')->update(['value' => $request->mail_host]);
        Configs::where('key','mail.mailers.smtp.port')->update(['value' => $request->mail_port]);
        Configs::where('key','mail.mailers.smtp.username')->update(['value' => $request->mail_username]);
        Configs::where('key','mail.mailers.smtp.password')->update(['value' => $request->mail_password]);
        $configs = Configs::where('key','mail.mailers.smtp.encryption')->update(['value' => $request->mail_encryption]);
        
    
        return redirect()->back()->with('success', 'General Setting Updated');
    }

    public function store_general(Request $request)
    {
        $rules =array(
            'name' => 'required',
            'url' => 'required|url',
            'description' => 'required',
        );
        
        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return redirect()->back();
        }
        if ($request->hasFile('favicon')) {
            $rules =array(
                'favicon' => 'required',// |dimensions:max_width=32px,max_height=32',
            );
            
            $validator=Validator::make($request->all(),$rules);
            
            if($validator->fails())
            {
                $messages=$validator->messages();
                $errors=$messages->all();
                return redirect()->back();
            }
            $imageFavicon = $request->file('favicon');
            
			//name file
			$imagenameFavicon = $imageFavicon->getClientOriginalName();
			$aFavicon = explode(".", $imagenameFavicon);
			$fileExtFavicon = strtolower(end($aFavicon));  
            $namaFileFavicon = substr(md5(date("YmdHis")),0,10).".".$fileExtFavicon;

			//penyimpanan
            $destination_pathFavicon = public_path().'/favicon/';
            
			// simpan ke folder
			$request->file('favicon')->move($destination_pathFavicon,$namaFileFavicon);
        }else{
            $namaFileFavicon = config('mail.from.app_favicon');
        }

        Configs::where('key','app.name')->update(['value' => $request->name]);
        Configs::where('key','app.url')->update(['value' => $request->url]);
        Configs::where('key','mail.from.app_description')->update(['value' => $request->description]);
        Configs::where('key','mail.from.app_favicon')->update(['value' => $namaFileFavicon]);
        
        return redirect()->back()->with('success', 'General Setting Updated');
    }
}
