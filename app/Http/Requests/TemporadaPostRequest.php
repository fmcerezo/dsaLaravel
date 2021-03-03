<?php

namespace App\Http\Requests;

use App\Rules\TemporadaRule;
use Illuminate\Foundation\Http\FormRequest;

class TemporadaPostRequest extends FormRequest
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
            'ano_inicio_temporada' => [
                'bail',
                'integer',
                'required',
                'min:1900',
                'unique:App\Models\Temporada,ano_inicio_temporada',
                new TemporadaRule($this->ano_fin_temporada)
            ],
            'ano_fin_temporada' => 'integer|required|min:1900|unique:App\Models\Temporada,ano_fin_temporada',
        ];
    }
}
