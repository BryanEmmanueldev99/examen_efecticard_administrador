<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    public function index()
    {
        if(Auth::user()->verified == 'APROBADO'){
        
        } else {
            return redirect(route('form_login'));
        } 
        $endpoint = Http::get('http://127.0.0.1:5000/api/clientes');
        $clientes = $endpoint->json();
        return view('home.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->verified == 'APROBADO'){
        
        } else {
            return redirect(route('form_login'));
        } 
        return view('home.clientes.create');
    }

    
    public function store(Request $request)
    {
        if(Auth::user()->verified == 'APROBADO'){
        
        } else {
            return redirect(route('form_login'));
        } 
        $endpoint = Http::post('http://127.0.0.1:5000/api/clientes', 
        [
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'email' => $request->email
        ]);

            $api = $endpoint->json();

            if(empty($api)) {
                    return redirect(route('listar_clientes'))->with('success_cliente', '¡Cliente registrado!');
            } else {
                    return redirect()->back()->with('errors', $api);
            } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $endpoint = Http::delete('http://127.0.0.1:5000/api/clientes/'.$id);
         return redirect(route('listar_clientes'))->with('success_delete_cliente', '¡Cliente eliminado!');
    }
}
