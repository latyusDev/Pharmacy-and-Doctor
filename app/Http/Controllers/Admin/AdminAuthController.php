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
        $admin_detail = $request->only($this->data());
        $admin_detail['password'] = Hash::make($admin_detail['password']);
        $admin = Admin::create($admin_detail);
        $address_details = $request->except($this->data());
        $address_details['addresable_type'] = Admin::class;
        $address_details['addresable_id'] = $admin->id;
        Address::create($address_details);
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
    
    private function data()
    {
        return [
            'last_name',
            'first_name',
            'email',
            'password',
        ];
    }
}
