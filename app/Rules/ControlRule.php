<?php

namespace App\Rules;

use App\Http\Requests\ControlPostRequest;
use App\Models\Temporada;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ControlRule implements Rule
{
    protected ControlPostRequest $controlPostRequest;
    protected string $message;
    protected Temporada $temporada;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(ControlPostRequest &$control)
    {
        $this->controlPostRequest = &$control;

        if ($control->request->has('id_temporada'))
            $this->temporada = Temporada::find($control->request->get('id_temporada'));
        else
            $this->temporada = new Temporada();

        /*  Hay que controlar los campos check, porque si no se seleccionan no se envían en el POST,
            en lugar de enviarlos informados a false. */
        if ($control->request->has('activo'))
            $control->request->set('activo', true);
        else
            $control->request->add(['activo' => false]);
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
        switch ($attribute) {
            case 'fecha_celebracion':
            case 'fecha_fin_inscripcion':
                $year = 0;
                $this->message = 'fechaFueraTemporada';
                try {
                    $fecha = Carbon::createFromFormat('Y-m-d', $value);
                    if ('fecha_fin_inscripcion' == $attribute) {
                        $fechaCelebracion = Carbon::createFromFormat('Y-m-d', $this->controlPostRequest->request->get('fecha_celebracion'));
                        // Se comprueba que la fecha límite de inscripción no es posterior a la de celebración.
                        if ($fecha->greaterThan($fechaCelebracion)) {
                            $this->message = 'fechaInscripcionPosteriorCelebracion';

                            return false;
                        }
                    }
                    $year = $fecha->year;
                }
                finally {
                    // Se comprueba que las fechas pertenecen a la temporada informada.
                    return $year >= $this->temporada->ano_inicio_temporada && $year <= $this->temporada->ano_fin_temporada;
                }
                break;
            
            default:
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
        return trans('validation.controlRule.' . $this->message);
    }
}
