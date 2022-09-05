<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\EstadoCivil;
use App\Models\Discapacidad;
use App\Models\LenguaMaterna;
use App\Models\Egreso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perso = Persona::orderBy('id_persona','ASC')->paginate(10);
        $estadoCivil = EstadoCivil::all();
        $disca = Discapacidad::all();
        $lengMater = LenguaMaterna::all();
        $egreso = Egreso::all();
        return view('Persona.index', compact('perso', 'estadoCivil', 'disca', 'lengMater', 'egreso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perso = Persona::find($id);

        $request->validate([
            'numero_documento'  =>  'required|max:9',
        ]);

        $año_egreso = Egreso::where('id_egreso', $request->id_egreso)->first();

        $perso = Persona::find($id);
        $perso->update($request->all());
        $perso->año_egreso = $año_egreso->egreso;
        $perso->save();
        if($perso->save()){
            return redirect(to: '/administrador/Persona')->with('edit', '¡Persona Actualizada Satisfactoriamente!');
        }else{
            exit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
