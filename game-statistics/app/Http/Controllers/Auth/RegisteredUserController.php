<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
     
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dbirth'=>['required','date','before:today'],
            'nickname'=>['required','max:69','min:3','string'],
            'profilePicture'=>['required','file','mimes:jpg,png,webp,gif,svg,jpeg,tiff,arw,cr2,raw,rw2'],
        ]);
    
           $picturePath=null;
        if($request->hasFile('profilePicture')){
            $file=$request->file('profilePicture');
            $pictureName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$pictureName);
            $picturePath='uploads/'.$pictureName;
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dbirth'=>$request->dbirth,
            'nickname'=>$request->nickname,
            'profilePicture'=>$picturePath
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
