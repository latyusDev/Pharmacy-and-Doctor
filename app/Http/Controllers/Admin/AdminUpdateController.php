<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUpdateController extends Controller
{
    public function banUser(User $user)
    {
        $user->updateUserStatus($user->id,true);
        return back()->with('msg',$user->fullname.' is banned');
    }

    public function releaseUser(User $user)
    {
        $user->updateUserStatus($user->id,false);
        return back()->with('msg',$user->fullname.' is release');
    }
    public function banPharmacy(Pharmacy $pharmacy)
    {
        $pharmacy->updatePharmacyStatus($pharmacy->id,true);
        return back()->with('msg',$pharmacy->name.' is banned');
    }

    public function releasePharmacy(Pharmacy $pharmacy)
    {
        $pharmacy->updatePharmacyStatus($pharmacy->id,false);
        return back()->with('msg',$pharmacy->name.' is release');
    }
}
