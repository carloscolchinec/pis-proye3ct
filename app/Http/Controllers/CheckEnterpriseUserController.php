<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CheckEnterprise;


class CheckEnterpriseUserController extends Controller
{

    
    public function dashboard()
    {
        // Verificar si el usuario está autenticado
        if (Auth::guard('enterprise')->check()) {
            return view('enterprise.dashboard');
        } else {
            return redirect()->route('enterprise.login');
        }
    }
    
    public function showLoginForm()
    {
        // Verificar si el usuario ya está autenticado
        if (Auth::guard('enterprise')->check()) {
            return redirect()->route('enterprise.dashboard');
        }

        return view('enterprise.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        try {


            if (Auth::guard('enterprise')->attempt($credentials)) {
                // Autenticación exitosa para usuarios de empresas
                return redirect()->route('enterprise.dashboard');
            } else {
                // Credenciales inválidas para usuarios de empresas
                return redirect()->back()->with('message', 'Credenciales inválidas para usuarios de empresas.');

            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', "$e");
        }
    }
    

    public function logout()
    {
        Auth::guard('enterprise')->logout();
        return redirect()->route('enterprise.login');
    }
}
