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
    'integer' => 'El campo ":attribute" debe ser un número.',
    'min' => [
        'numeric' => 'El campo ":attribute" no puede ser inferior a :min.',
    ],

    'temporadaRule' => 'El año de fin de temporada debe ser el siguiente al año de inicio.',
   
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
        'ano_inicio_temporada' => 'Año inicio temporada',
        'ano_fin_temporada' => 'Año fin temporada'
    ],

];
