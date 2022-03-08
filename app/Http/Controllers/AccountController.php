<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use Auth;
use DB;

class AccountController extends Controller
{
    //
    public function account(){
        $userId = Auth::user()->account_id;

        $accounts = DB::table('accounts')
                    ->join('roles', 'roles.role_id', '=', 'accounts.role_id')
                    ->where('accounts.account_id', '!=', $userId)
                    ->paginate(15);

        return view('account', compact('accounts'));
    }

    public function changeRole($id){
        $user = Account::where('account_id', $id)->first();

        $roles = Role::all();

        return view('changerole', compact('user', 'roles'));
    }

    public function updateRole(Request $request, $id){
        Account::where('account_id', $id)->update([
            'role_id' => $request->input('role')
        ]);

        return redirect('/account');
    }

    public function delete($id){
        Account::where('account_id', $id)->delete();

        return redirect('/account');
    }
}
