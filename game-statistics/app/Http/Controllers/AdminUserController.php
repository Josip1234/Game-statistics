<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::orderBy('id')->paginate(5);
        return view('admin.users.index',[
            'users'=>$users
        ]);
    }
    public function edit(User $user){
        return view("admin.users.edit",
        ['user'=>$user]);
    }
    public function update(User $user, Request $request){

        $validated=$request->validate([
            'userType'=>['required','in:0,1'],
        ]);
        $user->update($validated);
        return redirect()->route('admin.users.index')->with('status','User has been successfully updated.');
    }
    public function delete(User $user){
        if($user->id===auth()->id()){
            abort(403,"You cannot delete yourself.");
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('status','User has been successfully deleted.');
    }
}
