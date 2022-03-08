<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view("auth.register", compact("roles"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'gender' => ['required'],
            'first_name' => ['required', 'alpha', 'max:25'],
            'middle_name' => ['nullable', 'alpha', 'max:25'],
            'last_name' => ['required', 'alpha', 'max:25'],
            'email' => ['required', 'string', 'email', 'unique:accounts'],
            'password' => ['required',
                            'string',
                            Password::min(8)->numbers()
                        ],
            'display_picture' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();

        $path = $request->file('display_picture')->store('public/images');

        if($data['role'] == 1){
            $last = Account::where('account_id', 'LIKE', 'ADMIN%')->count();

            $id = 'ADMIN' . sprintf($last+1);
        }else{
            $last = Account::where('account_id', 'LIKE', 'USER%')->count();

            $id = 'USER' . sprintf($last+1);
        }

        return Account::create([
            'account_id' => $id,
            'role_id' => $data['role'],
            'gender_id' => $data['gender'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'display_picture_link' => $path
        ]);
    }
}
