<?php

namespace App\Rules;

use App\Models\Nasabah;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class valid_id implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       if(Nasabah::where('id', $value)->get()->first() == null){

          $fail("Nasabah tidak ditemukan");
       }
    }


}
