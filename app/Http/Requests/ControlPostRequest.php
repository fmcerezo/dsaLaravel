<?php

namespace App\Http\Requests;

use App\Rules\ControlRule;
use Illuminate\Foundation\Http\FormRequest;

class ControlPostRequest extends FormRequest
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
        $controlRule = new ControlRule($this);

        return [
            'id_temporada' => 'bail|required|integer',
            'fecha_celebracion' => [
                'bail',
                'required',
                'date',
                $controlRule
            ],
            'fecha_fin_inscripcion' => [
                'bail',
                'required',
                'date',
                $controlRule
            ],
            'descripcion' => 'required|max:100',
        ];
    }
}
