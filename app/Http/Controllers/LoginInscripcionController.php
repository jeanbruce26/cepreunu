<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;

class LoginInscripcionController extends Controller
{
    public function index()
    {
        $proceso = Proceso::where('estado',1)->first();
        return view('usuario.auth.validacion', compact('proceso'));
    }

    public function logout(Request $request)
    {
        auth('pagos')->logout();

        return redirect()->route('usuario.login');
    }
}
