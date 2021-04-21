<?php

namespace App\Rules;

use App\Http\Requests\PruebaControlPostRequest;
use Illuminate\Contracts\Validation\Rule;

class PruebaControlRule implements Rule
{
    protected PruebaControlPostRequest $pruebaControl;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(PruebaControlPostRequest $pruebaControl)
    {
        $this->pruebaControl = $pruebaControl;
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
        $ret = \App\Models\PruebaControl::where('control_id_control', $this->pruebaControl->control_id_control)
        ->where('prueba_id_prueba', $this->pruebaControl->prueba_id_prueba)
        ->where('categoria_id_categoria', $this->pruebaControl->categoria_id_categoria)
        ->where('sexo', $this->pruebaControl->sexo)->first();

        return empty($ret);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.pruebaControlRule');
    }
}