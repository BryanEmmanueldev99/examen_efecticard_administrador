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
    public function index(Request $request)
    {
        if(Auth::user()->verified == 'APROBADO'){
            return view('home.index');
        } else {
            return redirect(route('form_login'));
        } 
    }

    public function listar_usuarios()
    {
        if(Auth::user()->verified == 'APROBADO'){

            if(Auth::user()->id != 1) {
                return redirect(route('home'));
            }
        
        } else {
            return redirect(route('form_login'));
        } 

        //hago una query para ocultar al perfil de administrador, donde solo me muestre todos los usuarios que tengan igual o arriba del id: 2
        $usuarios = User::where('id', '>=', 2)->simplePaginate(25);
        return view('home.auth.usuarios', compact('usuarios'));
    }

    public function aprobar_usuario($id)
    {
    
        $usuario = User::findOrFail($id);
        $usuario->verified = 'APROBADO';
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
        if(Auth::user()->verified == 'APROBADO'){

        } else {
            return redirect(route('form_login'));
        } 

        $usuario = User::findOrFail($id);
        return view('home.usuarios.mi_cuenta', compact('usuario'));
    }


    public function admin_edit($id)
    {
        if(Auth::user()->verified == 'APROBADO'){

            if(Auth::user()->id != 1) {
                return redirect(route('home'));
            }
        
        } else {
            return redirect(route('form_login'));
        } 

        $usuario = User::findOrFail($id);
        return view('home.usuarios.edit_usuario', compact('usuario'));
    }


    
    public function update(UpdateUserRequest $request, $id)
    {
        if(Auth::user()->verified == 'APROBADO'){
    

        } else {
            return redirect(route('form_login'));
        } 

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
        if(Auth::user()->verified == 'APROBADO'){
        
        } else {
            return redirect(route('form_login'));
        } 

        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()
                 ->back()
                 ->with('success_delete','¡Usuario borrado!');
    }
}
