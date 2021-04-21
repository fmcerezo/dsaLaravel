<?php

namespace App\Http\Requests;

use App\Rules\PruebaControlRule;
use Illuminate\Foundation\Http\FormRequest;

class PruebaControlPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'control_id_control' => [
                new PruebaControlRule($this)
               ]
        ];
    }
}
