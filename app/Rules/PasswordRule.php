<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Implement your custom password validation logic here
        // Example: Check for a minimum length of 8 characters, mixed case, numbers, and symbols
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d])[\S]{8,}$/', $value);
    }

    public function message()
    {
        return 'The password must be at least 8 characters long and contain a combination of lowercase letters, uppercase letters, numbers, and symbols.';
    }
}