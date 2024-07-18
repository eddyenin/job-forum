<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerUser()
    {
        return view('auth.register');
    }

    public function store(AuthRequest $request)
    {
        $userAttributes = $request->validated();

        $employerAttributes = $request->validate([
            'employer'=>['required'],
            'logo'=>['required', File::types(['png','jpg','png','jpeg'])]
        ]);

        if($userAttributes->fails()){
            throw ValidationException::withMessages([]);

        }

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('logos');

        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $loginAtrributes = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if(! Auth::attempt($loginAtrributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();

       return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
