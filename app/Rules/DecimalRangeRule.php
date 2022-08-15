<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DecimalRangeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $decimal = explode('.', $value);
        if (isset($decimal[0]))
        {
            $len = strlen((string) $decimal[0]);
            if ($len > 14)
                return false;
        }
        if (isset($decimal[1]))
        {
            $len = strlen((string) $decimal[1]);
            if ($len > 8)
                return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'تعداد ارقام خارج از محدوده است، بخش صحیح باید 14 رقم و بخش اعشار 8 رقم باشد.';
    }
}
