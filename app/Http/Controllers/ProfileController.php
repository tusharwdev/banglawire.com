<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('backend.profile.index');
    }
    public function update(Request $request){
        $this->validate($request,[
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email,'. Auth::id(),
           'avatar' => 'nullable|image'
        ]);

//        Get loged in user

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email

        ]);
//        upload image

        if ($request->hasFile('avatar')){
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }
        notify()->success('Profile Updated','success');
        return back();
    }

    public function changePassword(){
        return view('backend.profile.password');
    }
    function updatePassword(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);
        $user = Auth::user();
        $hashedPassword= $user->password;
        if (Hash::check($request->current_password,$hashedPassword)){

            if (!Hash::check($request->password,$hashedPassword)){
               $user->update([
                   'password' => Hash::make($request->password)
               ]);
               Auth::logout();

               return redirect()->route('login');
            }else{
                notify()->warning('New password cannot be same as old password','warning');
            }
        }
        else{
            notify()->error("Current Password Dosen't mathch ","error");
        }
        return back();
    }
}
