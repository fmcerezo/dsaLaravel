<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TemporadaRule implements Rule
{
    protected $anoFinTemporada;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($anoFinTemporada)
    {
        $this->anoFinTemporada = $anoFinTemporada;
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
        return $value == $this->anoFinTemporada - 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.temporadaRule');
    }
}
