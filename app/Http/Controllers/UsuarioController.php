<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Mail\ActivacionLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprovacion = Auth::user()->verified;
        if($aprovacion == 'APROVADO'){
            return view('home.index');
        } else {
            return view('login.login');
        }
    }

    public function listar_usuarios()
    {
        //hago una query para ocultar al perfil de administrador, donde solo me muestre todos los usuarios que tengan igual o arriba del id: 2
        $usuarios = User::where('id', '>=', 2)->simplePaginate(25);
        return view('home.auth.usuarios', compact('usuarios'));
    }

    public function aprobar_usuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->verified = 'APROVADO';
        $usuario->save();


        $data = array(
            'name' 		=> $usuario->name, 
            'email'		=> $usuario->email,
        );

        Mail::to($usuario->email)->send(new ActivacionLogin($data));

        return redirect()
                ->back()
                ->with('success','¡Usuario aprovado!');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('home.usuarios.mi_cuenta', compact('usuario'));
    }

    
    public function update(UpdateUserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if(!empty($request->password_confirmation)){
            $usuario->password = $request->password_confirmation;
        }
    
        $usuario->save();

        return redirect()
                 ->back()
                 ->with('success','¡Tus datos se actualizaron!');
    }

    
    public function destroy(string $id)
    {
        //
    }
}
