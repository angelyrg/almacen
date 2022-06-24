<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor =  $request->get('buscarpor');
        $salidas = Salida::where('nombre', 'LIKE', '%'.$buscarpor.'%')->orwhere('dni', 'LIKE', '%'.$buscarpor.'%')->paginate(5);
        return view("salidas.index", compact('salidas', 'buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("salidas.create");

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

        $salida = new Salida();
        $salida->nombre = $valData["nombre_encargado"];
        $salida->dni = $valData["dni_encargado"];
        $salida->usuario_id = Auth::user()->id;
        $salida->save();

        $ultima_salida = Salida::findOrFail($salida->id);

        return redirect()->route('salidas.show', ['salida' => $ultima_salida])->with('success','Salida creado satisfactoriamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        $articulos = Articulo::all();
        
        return view("salidas.show", compact('salida', 'articulos') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        return view('salidas.edit', compact('salida'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        $valData = $request->validate([
            'nombre_encargado' => 'required|string|max:30',
            'dni_encargado' => 'required|numeric|digits:8',
        ]);

        $salida->nombre = $valData["nombre_encargado"];
        $salida->dni = $valData["dni_encargado"];
        $salida->save();
        return redirect()->route('salidas.index')->with('success','Salida actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        foreach( $salida->salida_detalles as $item ){
            $articulo = Articulo::findOrFail($item->articulo_id);
            $articulo->stock = $articulo->stock + $item->cantidad;
            $articulo->save();
        }
        
        if($salida->delete()){
            return redirect()->route('salidas.index')->with('success','Salida eliminado correctamente.');
        }else{
            return back()->with('danger', 'No se pudo eliminar');
        }

    }
}
