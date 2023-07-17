<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AdminUser;



class AdminUserController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            // Usuario autenticado, redirigir al dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // Usuario no autenticado, mostrar el formulario de inicio de sesión
            return view('admin.login');
        }
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        try {
            if (Auth::guard('web')->attempt($credentials)) {
                // Autenticación exitosa para administradores
                return redirect()->route('admin.dashboard');
            } else {
                // Credenciales inválidas para administradores
                return redirect()->back()->with('message', 'Credenciales inválidas para administradores.');
            }
        } catch (\Exception $e) {
            // Manejo de la excepción de autenticación
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
    
    
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.dashboard')->with('message', 'Has cerrado sesión exitosamente');
    }

    public function dashboard()
    {
        // Verificar si el usuario ha iniciado sesión
        if (Auth::guard('web')->check()) {
            // Usuario autenticado, mostrar el dashboard
            return view('admin.dashboard');
        } else {
            // Usuario no autenticado, redirigir al formulario de inicio de sesión
            return redirect()->route('admin.login')->with('message', 'Debes iniciar sesión para acceder al dashboard');
        }
    }
    
    
}
