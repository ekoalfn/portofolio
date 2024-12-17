<?php

namespace App\Http\Controllers;

use App\Models\Configs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SettingController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:setting-general', ['only' => ['index']]);
    }

    public function index()
    {
        return view('pages.settings.index');
    }

    public function general(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);

        // validation logo
        if ($request->file('logo')) {
            $imageLogo = $request->file('logo');
            
			//name file
			$imagenameLogo = $imageLogo->getClientOriginalName();
			$aLogo = explode(".", $imagenameLogo);
			$fileExtLogo = strtolower(end($aLogo));  
            $namaFileLogo = substr(md5(date("YmdHis")),0,10).".".$fileExtLogo;

			//penyimpanan
            $destination_pathLogo = public_path().'/logo/';
            
			// simpan ke folder
			$request->file('logo')->move($destination_pathLogo,$namaFileLogo);
            Configs::where('key', 'mail.from.app_logo')->update(['value' => $namaFileLogo]);
        }

        // validation favicon
        if ($request->file('favicon')) {
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
            Configs::where('key', 'mail.from.app_favicon')->update(['value' => $namaFileFavicon]);
        }

        $config = Configs::where('key', 'app.name')->update(['value' => $request->name]);
        $config = Configs::where('key', 'app.url')->update(['value' => $request->url]);
        $config = Configs::where('key', 'mail.from.app_description')->update(['value' => $request->description]);

        if ($config) {
            return redirect()->route('settings.index')->with('success-general', 'General Setting Updated!!');
        }

        return redirect()->route('settings.index')->with('success-general', 'General Setting Updated!!');

    }

    public function mailconfig(Request $request)
    {
        $request->validate([
            'mail_name' => 'required',
            'mail_address' => 'required',
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required'
        ]);

        $config = Configs::where('key', 'mail.from.name')->update(['value' => $request->mail_name]);
        $config = Configs::where('key', 'mail.from.address')->update(['value' => $request->mail_address]);
        $config = Configs::where('key', 'mail.default')->update(['value' => $request->mail_driver]);
        $config = Configs::where('key', 'mail.mailers.smtp.host')->update(['value' => $request->mail_host]);
        $config = Configs::where('key', 'mail.mailers.smtp.port')->update(['value' => $request->mail_port]);
        $config = Configs::where('key', 'mail.mailers.smtp.username')->update(['value' => $request->mail_username]);
        $config = Configs::where('key', 'mail.mailers.smtp.password')->update(['value' => $request->mail_password]);
        $config = Configs::where('key', 'mail.mailers.smtp.encryption')->update(['value' => $request->mail_encryption]);

        if ($config) {
            return redirect()->route('settings.index')->with('success-mail', 'Mail Configuration Updated!!');
        }

        // return failed with Api Resource
        return redirect()->route('settings.index')->with('error-frontend', 'Mail Configuration Failed to Update!');
    }

    public function reload(Request $request){
        $request->validate([
            'reload' => 'required'
        ]);

        $config = Configs::where('key', 'mail.from.reload')->update(['value' => $request->reload]);

        if ($config) {
            return redirect()->route('settings.index')->with('success-reload', 'Reload Setting Updated!!');
        }

        // return failed with Api Resource
        return redirect()->route('settings.index')->with('error-reload', 'Reload Setting Failed to Update!');
    }
}
