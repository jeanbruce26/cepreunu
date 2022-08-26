<?php

namespace App\Http\Livewire;

use App\Models\Pago;
use Livewire\Component;

class LoginInscripcion extends Component
{
    public $tipo_documento;
    public $documento;
    public $numero_operacion;

    // protected $rules = [
    //     'tipo_documento' => 'required|numeric',
    //     'documento' => 'required|numeric|digits:8',
    //     'numero_operacion' => 'required|numeric',
    // ];

    public function updated($propertyName)
    {
        if($this->tipo_documento == 1){
            $this->validateOnly($propertyName, [
                'tipo_documento' => 'required|numeric',
                'documento' => 'required|numeric|digits:8',
                'numero_operacion' => 'required|numeric',
            ]);
        }else{
            $this->validateOnly($propertyName, [
                'tipo_documento' => 'required|numeric',
                'documento' => 'required|numeric|digits:9',
                'numero_operacion' => 'required|numeric',
            ]);
        }
    }

    public function login()
    {
        if($this->tipo_documento == 1){
            $data = $this->validate([
                'tipo_documento' => 'required|numeric',
                'documento' => 'required|numeric|digits:8',
                'numero_operacion' => 'required|numeric',
            ]);
        }else{
            $data = $this->validate([
                'tipo_documento' => 'required|numeric',
                'documento' => 'required|numeric|digits:9',
                'numero_operacion' => 'required|numeric',
            ]);
        }

        $pago = Pago::where('dni',$this->documento)->where('numero_operacion',$this->numero_operacion)->first();

        if(!$pago){
            return redirect()->back()->with(array('mensaje'=>'Credenciales incorrectas'));
        }

        if($pago->estado == 1){
            auth('pagos')->login($pago);
            return redirect()->route('usuario-terminos-condiciones');
        }else if($pago->estado == 2){
            // $inscripcion = InscripcionPago::join('pago','inscripcion_pago.pago_id','=','pago.pago_id')->where('pago.dni',$request->documento )->where('pago.nro_operacion',$request->nro_operacion)->where('pago.estado',2)->get();
            // foreach($inscripcion as $item){
            //     $id_inscripcion = $item->inscripcion_id;
            // }
            // auth('pagos')->login($pago);
            // return redirect()->route('inscripcion.inscripcion', [$id_inscripcion]);
        }else if($pago->estado == 3){
            // return back()->with('mensaje','Usted ya no puede realizar una inscripción');
        }

    }

    public function render()
    {
        return view('livewire.login-inscripcion');
    }
}
