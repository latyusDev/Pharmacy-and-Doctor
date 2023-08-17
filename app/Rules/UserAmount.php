<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserAmount implements ValidationRule
{   
    public function __construct(
        public $drug
    ){}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $checkDrugQuantity = $this->drug->quantity==0?'':$this->drug->quantity;
        if($value > $this->drug->quantity || $value <= 0)
        {
            $fail('Amount must not be greater than '
                .$checkDrugQuantity.' or less than 1');
        }
    }
}
