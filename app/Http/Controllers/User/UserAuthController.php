<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{       
    public function register(UserRegisterRequest $request)
    {   
        $user_details = $request->only($this->parameter());
        $user_details['password'] = Hash::make($user_details['password']);
        $user = User::create($user_details);
        $address_details = $request->except($this->parameter());
        $address_details['addresable_type'] = User::class;
        $address_details['addresable_id'] = $user->id;
        Address::create($address_details);
        auth()->login($user);
        return redirect()->route('user.index');

    }

    public function login(Request $request)
    {
        if(auth()->attempt($request->only(['email','password'])))
        {
            $request->session()->regenerate();
            return redirect()->route('user.index');
        }
        return back()->withErrors(['email'=>'User credentials not found'])
                     ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    
    }

    private function parameter()
    {
        return [
            'first_name',
            'last_name',
            'email',
            'password'
        ];
    }
}
