<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','pharmacy_id',
        'price','quantity','description'
    ];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function scopeFilter($query,$keywords)
    {
        return $query->where('name','like',"%".$keywords."%")
                     ->orwhereHas('pharmacy',function($query)use($keywords){
                        return $query->whereName($keywords);
                      });
    }

    public function doctorProfit($price)
    {
        return 20/100*$price;
    }

    public function totalAmount($price)
    {
        return $this->doctorProfit($price)+$price;
    }

    public function updateDrugAmount($userQuantity,$drug):void
    {
        $drug->update(['quantity'=>$drug->quantity - $userQuantity]);
    }
}
