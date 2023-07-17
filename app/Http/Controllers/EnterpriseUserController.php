<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnterpriseUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EnterpriseUserController extends Controller
{

    public function index()
    {
        $usersEnterprises = EnterpriseUser::orderBy('created_at', 'desc')->get();

        return view('admin.list_enterprises', compact('usersEnterprises'));
    }

    public function create()
    {
        return view('admin.add_enterprises');
    }


    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name_enterprise' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]);
    
            $data['password'] = Hash::make($data['password']);
    
            EnterpriseUser::create($data);
    
            return redirect()->route('admin.listar-empresas')->with('success', 'Usuario de empresa creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo crear el usuario de la empresa.')->withInput();
        }
    }
    
    
    public function edit(EnterpriseUser $user)
    {
        return view('admin.edit_enterprises', compact('user'));
    }

    public function update(Request $request, EnterpriseUser $user)
    {
        $data = $request->validate([
            'name_enterprise' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user->update($data);

        return redirect()->route('enterprise_users.index')->with('success', 'Usuario de empresa actualizado exitosamente.');
    }

    public function destroy(EnterpriseUser $user)
    {
        $user->delete();

        return redirect()->route('enterprise_users.index')->with('success', 'Usuario de empresa eliminado exitosamente.');
    }

public function logout()
{
    Auth::guard('enterprise')->logout();
    
    return redirect()->route('login')->with('message', 'Sesión cerrada exitosamente.');
}

}
