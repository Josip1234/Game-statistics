<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::orderBy('id')->get();
        return view('admin.users.index',[
            'users'=>$users
        ]);
    }
}
