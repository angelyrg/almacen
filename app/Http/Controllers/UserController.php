<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Entrada;
use App\Http\Requests\UpdateProfileRequest;
use App\Salida;
use App\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
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
    public function index(Request $request)
    {
        //return view('users.index', ['users' => User::paginate(7)]);

        $buscarpor =  $request->get('buscarpor');
        $users = User::where('nombre', 'LIKE', '%'.$buscarpor.'%')
                    ->orwhere('apellido', 'LIKE', '%'.$buscarpor.'%')
                    ->orwhere('dni', 'LIKE', '%'.$buscarpor.'%')
                    ->orwhere('email', 'LIKE', '%'.$buscarpor.'%')
                    ->paginate(7);
        return view("users.index", compact('users', 'buscarpor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$request->user()->authorizeRole(['Administrador']);

        return view('users.create', [ 'sucursales' => Sucursal::All()]);
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
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'dni' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'celular' => ['required', 'numeric', 'digits:9'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],

            'role_id' => ['required', 'numeric'],
            'sucursal_id' => ['required', 'numeric'],
        ]);


        $user = new User;

        $user->nombre = $valData['nombre'];
        $user->apellido = $valData['apellido'];
        $user->dni = $valData['dni'];
        $user->celular = $valData['celular'];
        $user->email = $valData['email'];
        $user->password = Hash::make($valData['dni']); 
        if ($valData['role_id'] == 1){
            $user->role = "admin";
        }
        $user->sucursal_id = $valData['sucursal_id'];
        $user->save();
        
        return redirect()->route('usuarios.index')->with("success", "Usuario ".$user->nombre." registrado correctamente.") ;
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        //$request->user()->authorizeRole(['Administrador']);

        return view('users.edit', ['user' => $user,  'sucursals' => Sucursal::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $valData = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'dni' => 'required|numeric|digits:8|unique:users,dni,'.$user->id,
            'celular' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'email' => 'string|max:100|unique:users,email,'.$user->id,
            'sucursal_id' => ['required', 'numeric'],
            'role_id' => ['required', 'numeric']
        ]);

        $user->nombre = $valData['nombre'];
        $user->apellido = $valData['apellido'];
        $user->dni = $valData['dni'];
        $user->email = $valData['email'];
        $user->celular = $valData['celular'];
        if ($valData['role_id'] == 1){
            $user->role = "admin";
        }else{
            $user->role = null;
        }
        $user->sucursal_id = $valData['sucursal_id'];    
        $user->save();
    
        return redirect()->route('usuarios.index')->with("success", "Usuario ".$user->nombre." actualizado correctamente.") ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $articulos = Articulo::where('usuario_id', $user->id)->first();
        $entrada = Entrada::where('usuario_id', $user->id)->first();
        $salida = Salida::where('usuario_id', $user->id)->first();

        if (!(array)$articulos && !(array)$entrada && !(array)$salida ){
            $user->delete();
            return redirect()->route('usuarios.index')->with("success", "Usuario ".$user->nombre." eliminado exitosamente.");
        }else{
            return back()->with("danger", "No se puede eliminar ".$user->nombre.", porque hay registros asociados a este usuario.") ;
        }
    }


    public function perfil()
    {
        $misdatos = User::findOrFail( Auth::user()->id);
        return view('perfil.index', compact('misdatos'));
    }


    public function changePassword(UpdateProfileRequest $request)
    {

        if (! Hash::check($request->password_old, Auth::user()->password )){

            return back()->with('danger', 'Contraseña actual incorrecta.')->withInput();
            //throw ValidationException::withMessages(['password_old', 'Contraseña incorrecta']);

        }else{

            $me = User::FindOrFail( Auth::user()->id);
            $me->password = bcrypt($request->password_new);
            $me->save();

            return redirect()->route('password.edit')->with("success", "Contraseña actualizada.");

        }


    }


}
