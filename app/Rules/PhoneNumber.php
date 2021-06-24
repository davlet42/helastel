<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        $validation = false;

        $val = preg_replace('/[^0-9]/', '', $value);

        if (strlen($val) > 5) {
            $validation = preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value);
        }

        return $validation;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'Phone format error.';
    }
}
