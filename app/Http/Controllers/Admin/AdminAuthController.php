<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Address;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(AdminRegisterRequest $request)
    {   
        $adminDetail = $request->safe()->only(['last_name','first_name',
                                                    'email','password']);
        $adminDetail['password'] = Hash::make($adminDetail['password']);
        $admin = Admin::create($adminDetail);
        $addressDetails = $request->safe()->except(['last_name','first_name',
                                                        'email','password']);
        $addressDetails['addresable_type'] = Admin::class;
        $addressDetails['addresable_id'] = $admin->id;
        Address::create($addressDetails);
        auth('admin')->login($admin);
        return redirect()->route('admin.index');
    }

    public function login(Request $request)
    {
        if(auth('admin')->attempt($request->only(['email','password'])))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        return back()->withErrors(['email'=>'admin credentials not found'])
                     ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    
  
}
