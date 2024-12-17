<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    

    /**
     * Display the account page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();

        return view('pages.accounts.account', compact('user'));
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
        $user = User::find($id);

        $request->validate([
            'name'   => 'required',
            'email'   => 'required',
            'phone_number'   => 'required',
            'description'   => 'required',
        ]);

        //check image update
        if ($request->file('avatar')) {

            $request->validate([
                'avatar' => 'required|file|image|max:1240',
            ]);
            
            $image = $request->file('avatar');
            
            //name file
            $imagename = $image->getClientOriginalName();
            $a = explode(".", $imagename);
            $fileExt = strtolower(end($a));  
            $namaFile = substr(md5(date("YmdHis")),0,10).".".$fileExt;

            //penyimpanan
            $destination_path= public_path().'/avatar/';

            // simpan ke folder
            $request->file('avatar')->move($destination_path,$namaFile);

            // dd($image->hashName());

            //update category with new image
            $user->update([
                'avatar' => $namaFile,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'description' => $request->description,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
            ]);
        }

        //update product without image
        $user->update([
            'name'      => $request->name,
            'email'      => $request->email,
            'phone_number' => $request->phone_number,
            'description' => $request->description,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
        ]);
       
        if ($user) {
            //return success with Api Resource
            return redirect()->route('account.index')->with('success', 'Data Updated Successfully');
        }

        //return failed with Api Resource
        return redirect()->route('account.index')->with('error', 'Data Failed to Update');
    }

    public function delete_avatar($id)
    {
        $user = User::find($id);
        unlink(public_path().'/avatar/'.$user->avatar);
        $user->avatar = null;
        $user->update();
        return redirect()->back()->with('success', 'Avatar deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        $user = Auth::user();

        return view('pages.accounts.changepwd',compact('user'));
    }

    public function changepwd(Request $request)
    {

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {

            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:8|same:confirm_password',
                'confirm_password' => 'required',
            ]);

            $user = User::find(Auth::user()->id);
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            if ($user) {
                //return success with Api Resource
                return redirect()->route('account.password')->with('success', 'Password Update Successfully');
            }
        }
        return redirect()->route('account.password')->with('error', 'Current Password is wrong');
    }
}
