<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\EntradaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaDetalleController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valData = $request->validate([
            'entrada' => 'required|numeric',
            'articulo' => 'required|numeric',
            'cantidad_add' => 'required|numeric|min:1'
        ]);

        if (DB::table('articulos')->where('id', $valData['articulo'])->exists() && DB::table('entradas')->where('id', $valData['entrada'])->exists()){

            $articulo = Articulo::findOrFail($valData['articulo']);
            $articulo->stock = $articulo->stock + $valData['cantidad_add'];
            $articulo->save();
            
            $entradadetalle = new EntradaDetalle;
            $entradadetalle->entrada_id = $valData['entrada'];
            $entradadetalle->articulo_id = $valData['articulo'];
            $entradadetalle->cantidad = $valData['cantidad_add'];
            $entradadetalle->save();

            return redirect()->route('entradas.show', $valData['entrada'])->with('success', 'Artículo agregado');

        }else{
            return back()->with('danger', 'No se pudo agregar el artículo');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EntradaDetalle  $entradaDetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(EntradaDetalle $entradaDetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EntradaDetalle  $entradaDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntradaDetalle $entradadetalle)
    {

        //return $request;
        
        $valData = $request->validate([
            'articulo_id' => 'numeric|required|min:1',
            'cantidad' => 'numeric|required|min:1'

        ]);

        $articulo = Articulo::findOrFail($valData['articulo_id']);
        $articulo->stock = $articulo->stock - ($entradadetalle->cantidad - $valData['cantidad'] );
        $articulo->save();


        $entradadetalle->cantidad = $valData['cantidad'];
        $entradadetalle->save();

        return redirect()->route('entradas.show', $entradadetalle->entrada->id)->with('success', "Cantidad actualizada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EntradaDetalle  $entradaDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntradaDetalle $entradadetalle)
    {
        $articulo = Articulo::findOrFail($entradadetalle->articulo_id);
        $articulo->stock = $articulo->stock - $entradadetalle->cantidad;
        $articulo->save();

        $entradadetalle->delete();
        
        return redirect()->route('entradas.show', $entradadetalle->entrada->id)->with('success', "Registro elimiado");

    }

    public function search(Request $request)
    {
        $term = $request->get('term');

        return $term;
    }
}
