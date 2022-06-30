<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Sucursal;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = User::all()->count();
        $sucursales = Sucursal::all()->count();
        $articulos = Articulo::all()->count();
        return view('home', compact('usuarios', 'sucursales', 'articulos'));
    }

    public function resetPassword()
    {
        return view('perfil.resetPassword');
    }


}
