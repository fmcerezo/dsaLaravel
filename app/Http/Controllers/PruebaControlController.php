<?php

namespace App\Http\Controllers;

use App\Http\Requests\PruebaControlPostRequest;
use App\Models\Categoria;
use App\Models\Control;
use App\Models\Prueba;
use App\Models\PruebaControl;
use Illuminate\Http\Request;

class PruebaControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Control $control
     * @return \Illuminate\Http\Response
     */
    public function index(Control $control)
    {
        $pruebasControl = $control->pruebas()->orderBy('hora', 'ASC')->get();

        return view('admin.pruebaControl.index', compact('control', 'pruebasControl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Control $control
     * @return \Illuminate\Http\Response
     */
    public function create(Control $control)
    {
        $categorias = Categoria::all();
        $pruebas = Prueba::all();

        return view('admin.pruebaControl.create', compact('categorias', 'control', 'pruebas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PruebaControlPostRequest $request
     * @param  \App\Models\Control $control
     * @return \Illuminate\Http\Response
     */
    public function store(PruebaControlPostRequest $request, Control $control)
    {
        $pruebaControl = new PruebaControl();
        $pruebaControl->control_id_control = $control->id_control;
        foreach ($pruebaControl->getFillable() as $field)
            if ($request->has($field))
                $pruebaControl->$field = $request->$field;

        $pruebaControl->save();

        return redirect('controles/' . $control->id_control . '/pruebas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PruebaControl $pruebasControl
     * @return \Illuminate\Http\Response
     */
    public function edit(PruebaControl $pruebaControl)
    {
        $categorias = Categoria::all();
        $pruebas = Prueba::all();

        return view('admin.pruebaControl.edit', compact('categorias', 'pruebaControl', 'pruebas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PruebaControlPostRequest $request
     * @param  \App\Models\PruebaControl $pruebaControl
     * @return \Illuminate\Http\Response
     */
    public function update(PruebaControlPostRequest $request, PruebaControl $pruebaControl)
    {
        foreach ($pruebaControl->getFillable() as $field)
            if ($request->has($field))
                $pruebaControl->$field = $request->$field;
        
        $pruebaControl->save();
        
        return redirect('controles/' . $pruebaControl->control_id_control . '/pruebas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PruebaControl  $pruebaControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(PruebaControl $pruebaControl)
    {
        $pruebaControl->delete();

        return redirect('controles/' . $pruebaControl->control_id_control . '/pruebas');
    }
}
