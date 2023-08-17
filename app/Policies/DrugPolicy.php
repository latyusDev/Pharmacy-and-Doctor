<?php

namespace App\Policies;

use App\Models\Drug;
use App\Models\Pharmacy;
use Illuminate\Auth\Access\Response;

class DrugPolicy
{

    /**
     * Determine whether the pharmacy can view the model.
     */
    public function view(Pharmacy $pharmacy, Drug $drug): bool
    {
        return $pharmacy->id==$drug->pharmacy_id;
        //
    }

    /**
     * Determine whether the pharmacy can delete the model.
     */
    public function delete(Pharmacy $pharmacy, Drug $drug): bool
    {
        return $pharmacy->id==$drug->pharmacy_id;
    }

   
}
