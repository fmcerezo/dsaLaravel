<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Temporada;
use App\Http\Requests\ControlPostRequest;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controles = Control::orderBy('fecha_celebracion', 'DESC')->get();
        
        return view('admin.control.index', compact('controles'));
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

        return redirect('controles');
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
        
        return redirect('controles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        $control->delete();

        return redirect('controles');
    }
}
