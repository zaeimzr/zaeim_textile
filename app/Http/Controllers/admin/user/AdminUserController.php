<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(){
        $users=User::get();
        return view('admin/users/userslist',compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
        if (!empty($request->password)){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [ 'string', 'email', 'max:255', ],
                'balance'=>['numeric'],
                'phone_number'=>['numeric','digits_between:9,25'],
                'password' => [ 'string', 'min:8', 'confirmed'],
            ]);

            $password=Hash::make($request->password);
            $user->password=$password;
        }else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'balance'=>['numeric'],
                'phone_number'=>['numeric','digits_between:9,25'],
            ]);
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->balance=$request->balance;
        $user->phone_number=$request->phone_number;
        $user->role=$request->role;
        $user->save();
        $msg="ویرایش انجام شد";
        return redirect(route('admin.users'))->with('success',$msg);

    }

    public function destroy(User $user)
    {
        $user->delete();
        $msg="کاربر مدنظر حذف گردید";
        return redirect(route('admin.users'))->with('warning',$msg);

    }
}
