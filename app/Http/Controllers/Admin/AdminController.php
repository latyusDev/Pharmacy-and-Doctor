<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register()
    {
        return view('admin.register_form');
    }
    
    public function index()
    {
        return view('admin.index');
    }
    
    public function login()
    {
        return view('admin.login_form');
    }

    public function userIndex()
    {
        $users = User::all();
        return view('admin.user.user_index',[
                    'users'=>$users
        ]);
    }

    public function pharmacyIndex()
    {
        $pharmacies = Pharmacy::all();
        return view('admin.pharmacy.pharmacy_index',[
                    'pharmacies'=>$pharmacies
        ]);
    }

}
