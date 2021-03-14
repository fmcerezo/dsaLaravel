<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'date' => 'El campo ":attribute" debe ser una fecha válida.',
    'integer' => 'El campo ":attribute" debe ser un número.',
    'max' => [
        'string' => 'El campo ":attribute" no puede exceder los :max caracteres.',
    ],
    'min' => [
        'numeric' => 'El campo ":attribute" no puede ser inferior a :min.',
    ],
    'required' => 'El campo ":attribute" debe ser informado.',

    'controlRule.fechaFueraTemporada' => 'La ":attribute" no pertenece a la temporada seleccionada.',
    'controlRule.fechaInscripcionPosteriorCelebracion' => '":attribute" no puede ser posterior a la celebración del control.',
    'temporadaRule' => 'El año de fin de temporada debe ser el siguiente al año de inicio.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'id_temporada' => [
            'tieneControles' => 'La temporada que desea eliminar tiene controles.',
        ],
    ],
   
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        // Temporada
        'ano_inicio_temporada' => 'Año inicio temporada',
        'ano_fin_temporada' => 'Año fin temporada',

        // Control
        'fecha_celebracion' => 'Fecha de celebración',
        'fecha_fin_inscripcion' => 'Fecha límite de inscripción',
        'descripcion' => 'Descripción',
    ],

];
