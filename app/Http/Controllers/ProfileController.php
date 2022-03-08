<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        $roles = Role::all();

        return view('profile', compact('user', 'roles'));
    }

    public function update(Request $request){
        $request->validate([
            'role' => 'required',
            'gender' => 'required',
            'first_name' => 'required|alpha|max:25',
            'middle_name' => 'nullable|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'required|string|email|unique:users',
            'password' => ['required',
                            'string',
                            Password::min(8)->numbers()
                        ]
        ]);

        $userId = Auth::user()->account_id;

        Account::where('account_id', $userId)->update([
            'role_id' => $request->input('role'),
            'gender_id' => $request->input('gender'),
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        if($request->hasFile('display_picture')){
            $request->validate([
                'display_picture' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            $path = $request->file('display_picture')->store('public/images');

            Account::where('account_id', $userId)->update([
                'display_picture_link' => $path
            ]);
        }

        return redirect('/saved');
    }

    public function saved(){
        return view('saved');
    }
}
