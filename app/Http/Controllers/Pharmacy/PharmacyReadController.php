<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;

class PharmacyReadController extends Controller
{
    public function __construct()
    {
        $this->middleware('pharmacy')
             ->only('welcome');
    }

    public function index()
    {   
        $drugs = Drug::latest()->filter(request('search'))
                               ->simplePaginate(10);
        return view('pharmacy.welcome',[
            'drugs'=>$drugs
        ]);
    }

    public function show(Drug $drug)
    {   
        return view('pharmacy.welcome_show',[
            'drug'=>$drug
        ]);
    }

    public function register()
    {
        return view('pharmacy.register_form');
    }
    
    public function login()
    {
        return view('pharmacy.login_form');
    }
}
