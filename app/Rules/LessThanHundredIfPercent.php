<?php

namespace App\Rules;

use App\Enums\DiscountType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LessThanHundredIfPercent implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $amount = request()->toArray()['components'][0]['updates']['data.amount'] ?? 0;
        if ($amount > 100 && $value == 'percent'){
            $fail("The :attribute type is not compatible with $amount");
        }
    }
}
