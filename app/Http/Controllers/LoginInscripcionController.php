<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginInscripcionController extends Controller
{
    public function index()
    {
        return view('usuario.auth.validacion');
    }

    public function store(Request $request)
    {
        //
    }

    public function logout(Request $request)
    {
        //
    }
}
