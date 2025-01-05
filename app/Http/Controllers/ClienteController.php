<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $endpoint = Http::get('http://127.0.0.1:5000/api/clientes');
        $clientes = $endpoint->json();
        return view('home.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.clientes.create');
    }

    
    public function store(Request $request)
    {
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
    public function destroy(string $id)
    {
        //
    }
}
