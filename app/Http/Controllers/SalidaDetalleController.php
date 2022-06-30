<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\SalidaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidaDetalleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'salida' => 'required|numeric',
            'articulo' => 'required|numeric',
            'cantidad_add' => 'required|numeric|min:1'
        ]);

        if (DB::table('articulos')->where('id', $valData['articulo'])->exists() && DB::table('salidas')->where('id', $valData['salida'])->exists()){

            $articulo = Articulo::findOrFail($valData['articulo']);
            $articulo->stock = $articulo->stock - $valData['cantidad_add'];
            $articulo->save();
            
            $salidadetalle = new SalidaDetalle;
            $salidadetalle->salida_id = $valData['salida'];
            $salidadetalle->articulo_id = $valData['articulo'];
            $salidadetalle->cantidad = $valData['cantidad_add'];
            $salidadetalle->save();

            return redirect()->route('salidas.show', $valData['salida'])->with('success', 'Artículo retirado');

        }else{
            return back()->with('danger', 'No se pudo retirar el artículo');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(SalidaDetalle $salidaDetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(SalidaDetalle $salidaDetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalidaDetalle $salidadetalle)
    {
        $valData = $request->validate([
            'articulo_id' => 'numeric|required|min:1',
            'cantidad' => 'numeric|required|min:1'

        ]);

        $articulo = Articulo::findOrFail($valData['articulo_id']);
        $articulo->stock = $articulo->stock + ($salidadetalle->cantidad - $valData['cantidad'] );
        $articulo->save();


        $salidadetalle->cantidad = $valData['cantidad'];
        $salidadetalle->save();

        return redirect()->route('salidas.show', $salidadetalle->salida->id)->with('success', "Cantidad actualizada");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalidaDetalle $salidadetalle)
    {
        $articulo = Articulo::findOrFail($salidadetalle->articulo_id);
        $articulo->stock = $articulo->stock + $salidadetalle->cantidad;
        $articulo->save();

        $salidadetalle->delete();
        
        return redirect()->route('salidas.show', $salidadetalle->salida->id)->with('success', "Registro elimiado");

    }
}
