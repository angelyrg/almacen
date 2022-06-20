<?php

namespace App\Http\Controllers;

use App\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("entradas.index", ['entradas' => Entrada::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("entradas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valData = $request->validate([
            'nombre_encargado' => 'required|string|max:30',
            'dni_encargado' => 'required|numeric|digits:8',
        ]);

        $entrada = new Entrada();
        $entrada->nombre = $valData["nombre_encargado"];
        $entrada->dni = $valData["dni_encargado"];
        $entrada->usuario_id = Auth::user()->id;
        $entrada->save();

        $ultima_entrada = Entrada::findOrFail($entrada->id);

        return redirect()->route('entradas.show', ['entrada' => $ultima_entrada])->with('success','Entrada creado satisfactoriamente.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        return view("entradas.show", compact('entrada') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        return view('entradas.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        $valData = $request->validate([
            'nombre_encargado' => 'required|string|max:30',
            'dni_encargado' => 'required|numeric|digits:8',
        ]);

        $entrada->nombre = $valData["nombre_encargado"];
        $entrada->dni = $valData["dni_encargado"];
        $entrada->save();
        return redirect()->route('entradas.index')->with('success','Entrada actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        
        if($entrada->delete()){
            return redirect()->route('entradas.index')->with('success','Entrada eliminado correctamente.');
        }else{
            return back()->with('danger', 'No se pudo eliminar');
        }

    }
}
