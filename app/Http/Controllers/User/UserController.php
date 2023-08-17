<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrugRequest;
use App\Models\Drug;
use App\Models\Order;
use App\Rules\UserAmount;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
        return view('user.index');
    }

    public function register()
    {
        return view('user.create');
    }

    public function login()
    {
        return view('user.login_form');
    }

    public function search()
    {
        $drug = Drug::with('pharmacy')
                    ->get();
        return response()->json($drug);
    }
    
    public function buy(Drug $drug)
    {
        return view('user.show',['drug'=>$drug]);
    }

    public function order(Request $request, Drug $drug)
    {   
        $request->validate([
            'quantity'=> ['required','numeric', new UserAmount($drug)]
        ]);   

        Order::create([
            'user_id'=>auth()->user()->id,
            'pharmacy_id'=>$drug->pharmacy->id,
            'quantity'=>$request->quantity
        ]);
        $drug->updateDrugAmount(
            $request->quantity,
            $drug
        );
        return back();
    }
   
   

}
