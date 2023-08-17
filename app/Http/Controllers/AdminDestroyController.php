<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDestroyController extends Controller
{
    public function destroyPharmacy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return back();
    }
    public function destroyUser(User $user)
    {
        $user->delete();
        return back();
    }
}
