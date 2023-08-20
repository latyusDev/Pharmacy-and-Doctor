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
        $pharmacyDetails = $request->safe()->only(['name','email','password']);
        $pharmacyDetails['password'] = Hash::make($pharmacyDetails['password']);
        $pharmacy = Pharmacy::create($pharmacyDetails);
        $addressDetails = $request->safe()->except(['name','email','password']);
        $addressDetails['addresable_type'] = Pharmacy::class;
        $addressDetails['addresable_id'] = $pharmacy->id;
        Address::create($addressDetails);
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
    
   
}
