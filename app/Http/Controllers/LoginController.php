<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuarios\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //vista registro
    public function form_registro()
    {
         return view('registro.registro');
    }

    //vista login
    public function form_login()
    {
         return view('login.login');
    }

    public function registro(UsuarioRequest $request)
    {
        //validar los datos
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->verified = 'DESAPROVADO';
         $user->save();

         Auth::login($user);
            
        return redirect('/login')
        ->with('success_prelogin', '¡A espera de confirmación!');
    }

    public function login(Request $request)
    {
        // Almacenamos las credenciales del correo y contraseña
	    $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $aprovacion = Auth::user()->verified;
            if($aprovacion == 'APROVADO'){
                return redirect(route('home'))
                ->with('success','¡Haz iniciado sesión correctamente!');
            } else {
                return redirect(route('form_login'))
                ->with('error_provider','¡Se necesita de aprovación, para ingresar!');
            }
	    }

        // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
        return back()->with('error_login','Uno o más campos no son correctos, por favor intentalo de nuevo.');
    }

    public function cerrar_sesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success','¡Haz cerrado la sesión correctamente!');
    }
}
