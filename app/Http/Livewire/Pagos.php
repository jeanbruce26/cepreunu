<?php

namespace App\Http\Livewire;

use App\Models\ModalidadPago;
use App\Models\Pago;
use App\Models\TipoDocumento;
use Livewire\Component;
use SebastianBergmann\Type\NullType;

class Pagos extends Component
{
    public $modalidad_pago2;
    public $tipo_documento2;
    public $documento;
    public $pago=null;
    public $seleccionar=[];
    public $total;
    public $monto = 0;
    public $id_inscripcion;

    public function updated($propertyName)
    {
        if($this->tipo_documento2 == 1){
            $this->validateOnly($propertyName, [
                'tipo_documento2' => 'required|numeric',
                'documento' => 'required|numeric|digits:8',
                'modalidad_pago2' => 'required|numeric',
            ]);
        }else{
            $this->validateOnly($propertyName, [
                'tipo_documento2' => 'required|numeric',
                'documento' => 'required|numeric|digits:9',
                'modalidad_pago2' => 'required|numeric',
            ]);
        }
    }

    public function mount($id)
    {
        $this->id_inscripcion = $id;
    }

    public function buscarPago()
    {
        if($this->tipo_documento2 == 1){
            $data = $this->validate([
                'tipo_documento2' => 'required|numeric',
                'documento' => 'required|numeric|digits:8',
                'modalidad_pago2' => 'required|numeric',
            ]);
        }else{
            $data = $this->validate([
                'tipo_documento2' => 'required|numeric',
                'documento' => 'required|numeric|digits:9',
                'modalidad_pago2' => 'required|numeric',
            ]);
        }
        // dd($this->all());
        if($this->documento != auth('pagos')->user()->dni){
            return redirect()->back()->with(array('mensaje-dni'=>'El dni ingresado no puede ser buscado o no lo pertenece.'));
        }else if($this->modalidad_pago2 != auth('pagos')->user()->id_modalidad_pago){
            return redirect()->back()->with(array('mensaje-dni'=>'La modalidad de pago ingresada no es la correcta.'));
        }
        
        $this->pago = Pago::where('dni',$this->documento)->where('estado',2)->get();

        return $this->pago;
    }

    public function contarMonto($id_pago,$valor)
    {
        $pago= Pago::select('monto')->where('id_pago',$id_pago)->first();
        $check = $this->seleccionar;
        foreach ($check as $checks){
            $v = $checks;
        }

        if($this->seleccionar && $v == $id_pago){
            $this->monto += $pago->monto;
            $this->total = $this->monto;
        }else{
            $this->monto -= $pago->monto;
            $this->total = $this->monto;
        }
        if(!$this->seleccionar){
            $this->total = 0;
            $this->monto = 0;
        }
    }

    public function guardarPago()
    {
        if(!$this->seleccionar){
            return back()->with(array('mensaje-seleccionar'=>'Debe seleccionar su pago, para continuar con su inscripcion.'));
        }

        $modalidad = ModalidadPago::find($this->modalidad_pago2);
        
        if(floatval($modalidad->monto) < floatval($this->total)){
            return back()->with(array('mensaje-seleccionar'=>'El monto ingresado no cumple con el monto minimo de la modalidad de pago'));
        }
        
        foreach($this->seleccionar as $item){
            // dump($item);

            $pago = Pago::find($item);
            $pago->estado = 3;
            $pago->id_inscripcion = $this->id_inscripcion;
            $pago->save();
        }
        
        $this->dispatchBrowserEvent('confirmacion-pago');

        return redirect()->route('usuario-inscripcion', $this->id_inscripcion);
    }

    public function render()
    {
        $modalidad_pago = ModalidadPago::all();
        $tipo_documento = TipoDocumento::all();
        
        return view('livewire.pagos', [
            'modalidad_pago' => $modalidad_pago,
            'tipo_documento' => $tipo_documento,
            'pago' => $this->pago,
            'total' => $this->total
        ]);
    }
}
