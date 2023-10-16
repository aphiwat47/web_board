<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidBirthdate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
    public function passes($attribute, $value)
    {
        // Convert the input value to a Carbon date instance
        $birthdate = \Carbon\Carbon::parse($value);

        // Check if the birthdate is not in the future and not too far in the past
        return $birthdate->isPast() && $birthdate->diffInYears(now()) >= 18;
    }

    public function message()
    {
        return 'Your birthday is under 18 years old';
        
        //return 'The :attribute is not a valid birthdate.';
    }
}
