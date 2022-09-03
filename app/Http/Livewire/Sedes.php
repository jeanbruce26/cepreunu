<?php

namespace App\Http\Livewire;

use App\Models\Inscripcion;
use App\Models\Pago;
use App\Models\Proceso;
use App\Models\Sede;
use Livewire\Component;

class Sedes extends Component
{
    public $sede;
    public $proceso;
    public $pago_id;

    protected $rules = [
        'sede' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($pago_id)
    {
        $procesoo = Proceso::where('estado',1)->first();
        $this->proceso = $procesoo->id_proceso;
        $this->pago_id = $pago_id;
    }

    public function sedes()
    {
        $this->validate();

        // dd($this->all());

        $inscripcion = Inscripcion::create([
            'sede' => $this->sede,
            'id_proceso' => $this->proceso
        ]);

        $id_inscripcion = $inscripcion->id_inscripcion;

        $pago = Pago::find($this->pago_id);
        $pago->estado = 2;
        $pago->id_inscripcion = $id_inscripcion;
        $pago->save();

        return redirect()->route('usuario-pagos', [$id_inscripcion]);
    }

    public function render()
    {
        $sedee = Sede::all();
        $procesoo = Proceso::where('estado',1)->first();

        return view('livewire.sedes', [
            'sedee' => $sedee,
            'procesoo' => $procesoo
        ]);
    }
}
