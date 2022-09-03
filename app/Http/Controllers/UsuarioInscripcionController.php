<?php

namespace App\Http\Controllers;

use App\Models\ModalidadPago;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class UsuarioInscripcionController extends Controller
{
    public function index()
    {
        return view('usuario.inscripcion.terminos-condiciones');
    }

    public function sede()
    {
        return view('usuario.inscripcion.sede');
    }

    public function pagos($id)
    {
        return view('usuario.inscripcion.pagos', compact('id'));
    }
    
    public function inscripcion($id)
    {
        return view('usuario.inscripcion.inscripcion', compact('id'));
    }
}
