<?php

namespace App\Http\Controllers;

use App\Sucursal;
use App\User;
use Illuminate\Http\Request;

class SucursalController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'auth.admin']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sucursal.index', ['sucursals' => Sucursal::paginate(6)]);
        //return view('sucursales.index', ['sucursals' => Sucursal::paginate(6)]);
        //return redirect()->route('sucursales.index', ['sucursals' => Sucursal::paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.create');
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
            "nombre" => ["required", "string"],
            "direccion" => ["required", "string"],
            "distrito" => ["required", "string"],
            "provincia" => ["required", "string"],
            "departamento" => ["required", "string"],
        ]);

        $sucursal = new Sucursal();
        $sucursal->nombre = $valData['nombre'];
        $sucursal->direccion = $valData['direccion'];
        $sucursal->distrito = $valData['distrito'];
        $sucursal->provincia = $valData['provincia'];
        $sucursal->departamento = $valData['departamento'];
        $sucursal->save();

        return redirect()->route('sucursales.index')->with("success", "Sucursal ".$sucursal->nombre." agregado correctamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        return view("sucursal.show", compact('sucursal') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //$sucursal = Sucursal::findOrFail($sucursal);
        return view("sucursal.edit", ["sucursal"=>$sucursal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        $valData = $request->validate([
            "nombre" => ["required", "string"],
            "direccion" => ["required", "string"],
            "distrito" => ["required", "string"],
            "provincia" => ["required", "string"],
            "departamento" => ["required", "string"],
        ]);

        $sucursal->nombre = $valData['nombre'];
        $sucursal->direccion = $valData['direccion'];
        $sucursal->distrito = $valData['distrito'];
        $sucursal->provincia = $valData['provincia'];
        $sucursal->departamento = $valData['departamento'];
        $sucursal->save();

        return redirect()->route('sucursales.index')->with("success", "Sucursal ".$sucursal->nombre." actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */

    public function destroy(Sucursal $sucursal)
    {
        $users = User::where('sucursal_id', $sucursal->id)->first();

        if (!(array)$users){
            $sucursal->delete();
            return back()->with("success", "Sucursal ".$sucursal->nombre." eliminado exitosamente.");

        }else{
            return back()->with("danger", "No se puede eliminar ".$sucursal->nombre.", porque hay usuarios registrados en este sucursal.") ;
        }

    }
}
