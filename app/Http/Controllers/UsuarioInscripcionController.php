<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\ModalidadPago;
use App\Models\Pago;
use App\Models\Persona;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function pdf($id)
    {
        date_default_timezone_set("America/Lima");

        //reporte pdf
        $pdf_inscripcion = Inscripcion::where('id_inscripcion',$id)->first();
        $pdf_persona = Persona::where('id_persona', $pdf_inscripcion->id_persona)->first();
        $pdf_pago = Pago::where('id_inscripcion',$id)->get();
        $pdf_modalidad = '';
        $pdf_minimo = 1000;
        $pdf_total = 0;
        $pdf_veces = Inscripcion::join('persona','persona.id_persona','=','inscripcion.id_persona')->where('persona.numero_documento',$pdf_persona->numero_documento)->count();
        foreach($pdf_pago as $item){
            $pdf_total += $item->monto;
            if($item->monto < $pdf_minimo){
                $pdf_modalidad = "";
                $pdf_minimo = $item->monto;
                $pdf_modalidad = $item->ModalidadPago->modalidad_pago;
            }
        }

        $data = [ 
            'persona' => $pdf_persona,
            'inscripcion' => $pdf_inscripcion,
            'pago' => $pdf_pago,
            'total' => $pdf_total,
            'minimo' => $pdf_minimo,
            'modalidad' => $pdf_modalidad,
            'registro' => now(),
            'veces' => ($pdf_veces - 1),
        ];

        $nombre_pdf = 'REPORTE_MATRICULA_'.$pdf_persona->numero_documento.'.pdf';
        $pdf = PDF::loadView('usuario.inscripcion.pdf', $data);

        auth('pagos')->logout();
        
        return $pdf->stream($nombre_pdf);
    }
}
