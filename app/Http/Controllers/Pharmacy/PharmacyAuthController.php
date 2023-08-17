<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyRegisterRequest;
use App\Models\Address;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PharmacyAuthController extends Controller
{
    public function register(PharmacyRegisterRequest $request)
    {
        $pharmacy_details = $request->only($this->data());
        $pharmacy_details['password'] = Hash::make($pharmacy_details['password']);
        $pharmacy = Pharmacy::create($pharmacy_details);
        $address_details = $request->except($this->data());
        $address_details['addresable_type'] = Pharmacy::class;
        $address_details['addresable_id'] = $pharmacy->id;
        Address::create($address_details);
        auth('pharmacy')->login($pharmacy);
        return redirect()->route('pharmacy.welcome');
    }

    public function login(Request $request)
    {
        if(auth('pharmacy')->attempt($request->only(['email','password'])))
        {
            $request->session()->regenerate();
            return redirect()->route('pharmacy.welcome');
        }
        return back()->withErrors(['email'=>'Pharmacy credentials not found'])
                     ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('pharmacy.login');
    }
    
    private function data()
    {
        return [
            'name',
            'email',
            'password'
        ];
    }
}
