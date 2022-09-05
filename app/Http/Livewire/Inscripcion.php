<?php

namespace App\Http\Livewire;

use App\Models\Discapacidad;
use App\Models\Egreso;
use App\Models\EstadoCivil;
use App\Models\Etnia;
use App\Models\Inscripcion as ModelsInscripcion;
use App\Models\LenguaMaterna;
use App\Models\Modalidad;
use App\Models\Modular;
use App\Models\Pago;
use App\Models\Persona;
use App\Models\Proceso;
use App\Models\Sede;
use App\Models\SedeCarrera;
use App\Models\TurnoSede;
use App\Models\Ubigeo;
use Livewire\Component;
use Livewire\WithFileUploads;

class Inscripcion extends Component
{
    use WithFileUploads;

    public $apellido_paterno;
    public $apellido_materno;
    public $nombres;
    public $fecha_nacimiento;
    public $ubigeo;
    public $genero;
    public $lengua_materna;
    public $etnia;
    public $estado_civil;
    public $discapacidad;
    public $direccion;
    public $celular;
    public $correo;
    public $nombre_apoderado;
    public $celular_apoderado;
    public $foto;
    public $año_egreso;
    public $modalidad;
    public $departamento;
    public $colegio;
    public $turno;
    public $carrera;
    public $id_inscripcion;
    public $id_modalidad;
    public $id_anio;
    public $cole;
    public $turno_nombre;

    public $totalpasos = 3;
    public $pasoactual = 1;
    
    public function mount($id){
        $this->id_inscripcion = $id;
        $this->pasoactual = 1;
    }

    public function updated($anio)
    {
        $pro = Proceso::where('estado',1)->first();
        $mod1 = Modalidad::where('id_modalidad',1)->first();
        $mod2 = Modalidad::where('id_modalidad',2)->first();
        
        if(intval($pro->año) > intval($this->año_egreso)){
            $this->modalidad = $mod1->modalidad;
        }else{
            $this->modalidad = $mod2->modalidad;
        }

        $id_mod = Modalidad::where('modalidad',$this->modalidad)->first();
        $this->id_modalidad = $id_mod->id_modalidad;

        if($this->año_egreso){
            $anio_egre = Egreso::where('egreso',$this->año_egreso)->first();
            $this->id_anio = $anio_egre->id_egreso;
        }

        $this->cole = Modular::where('departamento',$this->departamento)->get();

        if($this->turno){
            $tur_nomb = TurnoSede::where('id_turno_sede',$this->turno)->first();
            $this->turno_nombre = $tur_nomb->turno->turno;
        }

    }

    public function disminuirPaso(){
        $this->resetErrorBag();     
        $this->pasoactual--;
        if($this->pasoactual < 1){
            $this->pasoactual = 1;
        }
    }

    public function aumentarPaso(){  
        $this->resetErrorBag();
        $this->validacion();            
        $this->pasoactual++;
        if($this->pasoactual > $this->totalpasos){
            $this->pasoactual = $this->totalpasos;
        }
    }

    public function validacion(){
        if($this->pasoactual == 5){
            $this->validate([
                'apellido_paterno' => 'required|string',
                'apellido_materno' => 'required|string',
                'nombres' => 'required|string',
                'fecha_nacimiento' => 'required|date',
                'ubigeo' => 'required|string|digits:6',     
                'genero' => 'required|string',
                'lengua_materna' => 'required|numeric',
                'estado_civil' => 'required|numeric',
                'discapacidad' => 'required|numeric',
                'direccion' => 'required|string',
                'etnia' => 'required|numeric',
                'celular' => 'required|numeric|digits:9',
                'correo' => 'required|email',
                'nombre_apoderado' => 'required|string',
                'celular_apoderado' => 'required|string|digits:9',
            ]);
        }else if($this->pasoactual == 5){
            $this->validate([
                'foto' => 'required|mimes:png,jpg|max:1024',
            ]);
        }
    }

    public function inscripcion()
    {
        $this->resetErrorBag();
        if($this->pasoactual == 5){
            $this->validate([
                'año_egreso' => 'required',
                'modalidad' => 'required',
                'departamento' => 'required|string',
                'colegio' => 'required|numeric',
                'turno' => 'required|numeric',     
                'carrera' => 'required|numeric',
            ]);
        }

        // dd($this->all());

        $data = $this->foto;
        $data = $filename = time().'_'.auth('pagos')->user()->dni.'.'.$data->extension();
        // $this->foto->move(public_path('Foto/Inscripcion/'), $filename);
        $imagen = $this->foto->storeAs('Inscripcion', $filename, 'public');

        $persona = Persona::create([
            'numero_documento' => auth('pagos')->user()->dni,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'nombres' => $this->nombres,
            'direccion' => $this->direccion,
            'celular' => $this->celular,
            'sexo' => $this->genero,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'email' => $this->correo,
            'año_egreso' => $this->año_egreso,
            'nombre_apoderado' => $this->nombre_apoderado,
            'celular_apoderado' => $this->celular_apoderado,
            'id_ubigeo' => $this->ubigeo,
            'id_lengua_materna' =>$this->lengua_materna,
            'id_estado_civil' => $this->estado_civil,
            'id_discapacidad' => $this->discapacidad,
            'id_etnia' => $this->etnia,
            'id_egreso' => $this->id_anio,
            'id_modular' => $this->colegio,
        ]);

        $inscripcion = ModelsInscripcion::where('id_inscripcion',$this->id_inscripcion)->first();
        $inscripcion->id_sede_carrera = $this->carrera;
        $inscripcion->turno = $this->turno_nombre;
        $inscripcion->id_persona = $persona->id_persona;
        $inscripcion->foto = $filename;
        $inscripcion->estado = 1;
        $inscripcion->id_inscripcion = $this->id_inscripcion;
        $inscripcion->save();

        $pagos = Pago::where('id_inscripcion',$this->id_inscripcion)->get();

        foreach($pagos as $item){
            $pago = Pago::find($item->id_pago);
            $pago->estado = 4;
            $pago->save();
        }

        return redirect()->route('usuario-pdf', $this->id_inscripcion);
    }


    public function render()
    {
        $ins_sed = ModelsInscripcion::where('id_inscripcion',$this->id_inscripcion)->first();
        $id_sed = Sede::where('sede',$ins_sed->sede)->first();
        return view('livewire.inscripcion',[
            'ubigeos' => Ubigeo::all(),
            'lengua' => LenguaMaterna::all(),
            'estado_ci' => EstadoCivil::all(),
            'etni' => Etnia::all(),
            'disca' => Discapacidad::all(),
            'anio' => Egreso::all(),
            'depart' => Modular::groupBy('departamento')->get(),
            'turn' => TurnoSede::where('id_sede',$id_sed->id_sede)->get(),
            'carre' => SedeCarrera::where('id_sede',$id_sed->id_sede)->where('id_modalidad',$this->id_modalidad)->get(),
        ]);

    }
}
