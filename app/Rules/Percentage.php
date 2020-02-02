<?php

namespace App\Rules;

use App\Models\Goal\Goal;
use Illuminate\Contracts\Validation\Rule;

class Percentage implements Rule
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
        return (Goal::where('account_id', auth()->user()->select_account_id)->sum('percentage') + $value) <= 100;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La percentuale che hai inserito non è valida';
    }
}
