<?php

namespace App\Http\Controllers;

use App\Models\CheckEnterprise;
use Illuminate\Http\Request;
use App\Models\ClientsEnterprise;
use App\Models\EnterpriseUser;

use Illuminate\Support\Facades\Auth;

class EnterpriseClientsController extends Controller
{
    public function index()
    {
        $enterprise = Auth::guard('enterprise')->user();
            dd(ClientsEnterprise::where('enterprise_user_id', $enterprise->id)->get());
        // Verificar si el usuario está autenticado

        // El usuario no está autenticado o no tiene enterprise_id válido
        // Realizar alguna acción adecuada, como redirigir o mostrar un mensaje de error
    }

    public function create()
    {
        return view('enterprise.clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:tb_clients_enterprise',
            'telefono' => 'required',
            'correo_electronico' => 'required|email|unique:tb_clients_enterprise',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            // Agrega más reglas de validación según tus necesidades
        ]);

        $enterpriseId = Auth::guard('enterprise')->id(); // Obtener el ID del usuario de empresa autenticado
        $client = new ClientsEnterprise($validatedData);
        $client->enterprise_user_id = $enterpriseId;
        $client->save();

        return redirect()->route('enterprise.clients.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit(ClientsEnterprise $client)
    {
        return view('enterprise.clients.edit', compact('client'));
    }

    public function update(Request $request, ClientsEnterprise $client)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:tb_clients_enterprise,cedula,' . $client->id,
            'telefono' => 'required',
            'correo_electronico' => 'required|email|unique:tb_clients_enterprise,correo_electronico,' . $client->id,
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            // Agrega más reglas de validación según tus necesidades
        ]);

        $client->update($validatedData);

        return redirect()->route('enterprise.clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(ClientsEnterprise $client)
    {
        $client->delete();

        return redirect()->route('enterprise.clients.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
