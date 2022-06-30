<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\EntradaDetalle;
use App\EstadoArticulo;
use App\SalidaDetalle;
use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticuloController extends Controller
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
        $articulos = Articulo::paginate(6);
        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create', ["unidad_medidas"=>UnidadMedida::all(), "estado_articulos"=>EstadoArticulo::all()]);
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
            'codigo' => 'required|max:10|unique:articulos',  //Correct way in laravel 5.7
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:255',
            'medida_id' => 'required',
            'stock' => 'required|numeric',
            'estado_id' => 'required',
        ]);

        $articulo = new Articulo();
        $articulo->codigo = $valData["codigo"];
        $articulo->nombre = $valData["nombre"];
        $articulo->descripcion = $valData["descripcion"];
        $articulo->stock = $valData["stock"];
        $articulo->estado_id = $valData["estado_id"];
        $articulo->medida_id = $valData["medida_id"];
        $articulo->usuario_id = Auth::user()->id;
        $articulo->save();

        return redirect("/articulos")->with('msg','¡Artículo creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view("articulos.show", compact('articulo') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', ["articulo"=>$articulo,"unidad_medidas"=>UnidadMedida::all(), "estado_articulos"=>EstadoArticulo::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $valData = $request->validate([
            'codigo' => 'required|max:10|unique:articulos,codigo,'.$articulo->id,
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:255',
            'medida_id' => 'required|exists:unidad_medidas,id',
            'stock' => 'required|numeric',
            'estado_id' => 'required|exists:estado_articulos,id',
        ]);

        $articulo->codigo = $valData["codigo"];
        $articulo->nombre = $valData["nombre"];
        $articulo->descripcion = $valData["descripcion"];
        $articulo->stock = $valData["stock"];
        $articulo->estado_id = $valData["estado_id"];
        $articulo->medida_id = $valData["medida_id"];
        $articulo->save();

        return redirect("/articulos")->with('msg','¡Artículo actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $entrada_detalle = EntradaDetalle::where('articulo_id', $articulo->id)->first();
        $salida_detalle = SalidaDetalle::where('articulo_id', $articulo->id)->first();

        if (!(array)$entrada_detalle && !(array)$salida_detalle){
            $articulo->delete();
            return redirect()->route("articulos.index")->with("success", "Artículo ".$articulo->nombre." eliminado correctamente.");
        }else{
            return back()->with("danger", "No se puede eliminar ".$articulo->nombre.", porque hay registros asociados con este articulo.") ;
        }


    }
}
