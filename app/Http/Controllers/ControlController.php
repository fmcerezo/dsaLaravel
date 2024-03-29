<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ImageGallery;
use App\Http\Requests\ControlPostRequest;
use App\Models\Control;
use App\Models\Temporada;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTemporada = 0)
    {
        if ($idTemporada > 0)
            $controles = Control::where('temporada_id_temporada', $idTemporada)
                                ->orderBy('fecha_celebracion', 'DESC')
                                ->paginate(10);
        else
            $controles = Control::orderBy('fecha_celebracion', 'DESC')->paginate(10);

        $temporadas = Temporada::orderBy('ano_inicio_temporada', 'DESC')->get();
        
        return view('admin.control.index', compact('controles', 'idTemporada', 'temporadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temporadas = Temporada::orderBy('ano_inicio_temporada', 'DESC')->get();

        return view('admin.control.create', compact('temporadas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ControlPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ControlPostRequest $request)
    {
        $control = new Control();
        foreach ($control->getFillable() as $field)
            $control->$field = $request->$field;
        
        $control->save();

        return redirect('controles/temporada/' . $control->temporada_id_temporada);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        $temporadas = Temporada::orderBy('ano_inicio_temporada', 'DESC')->get();

        return view('admin.control.edit', compact('temporadas', 'control'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ControlPostRequest  $request
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(ControlPostRequest $request, Control $control)
    {
        foreach ($control->getFillable() as $field)
            $control->$field = $request->$field;
        
        $control->save();
        
        return redirect('controles/temporada/' . $control->temporada_id_temporada);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        ImageGallery::emptyGallery($control);
        $control->delete();

        return redirect('controles/temporada/' . $control->temporada_id_temporada);
    }

    /**
     * Toggle Activo state.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function ajaxToggleActivo(Request $request)
    {
        $control = Control::find($request->id_control);
        if ($control == null)
            return false;
        else {
            $control->activo = !$control->activo;
            return $control->save();
        }
    }
}
