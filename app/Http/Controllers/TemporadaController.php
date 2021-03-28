<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use App\Http\Requests\TemporadaPostRequest;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temporadas = Temporada::orderBy('ano_inicio_temporada', 'DESC')->get();
        
        return view('admin.temporada.index',compact('temporadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.temporada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TemporadaPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemporadaPostRequest $request)
    {
        $temporada = new Temporada();
        foreach ($temporada->getFillable() as $field)
            $temporada->$field = $request->$field;
        
        $temporada->save();

        return redirect('temporadas');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporada $temporada)
    {
        if (empty($temporada->controles()->first())) {
            $temporada->delete();
            return redirect('temporadas');
        }
        else
            return redirect('temporadas')->withErrors([trans('validation.custom.id_temporada.tieneControles')]);
    }
}
