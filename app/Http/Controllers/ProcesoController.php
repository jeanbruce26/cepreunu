<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proce = Proceso::orderBy('id_proceso','ASC')->paginate(10);
        return view('Proceso.index', compact('proce'));
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
        $request->validate([
            'año'  =>  'required|max:11',
            'numero_proceso'  =>  'required|max:200',
            'estado'  =>  'required'
        ]);
        $proce = Proceso::create($request->all());
        session()->flash('new', '¡Proceso Creado Satisfactoriamente!');
        return redirect()->route('Proceso.index');
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
        $proce = Proceso::find($id);

        $request->validate([
            'año'  =>  'required|max:11',
            'numero_proceso'  =>  'required|max:200',
            'estado'  =>  'required'
        ]);
        $proce = Proceso::find($id);
        $proce->update($request->all());
        if($proce->save()){
            return redirect(to: '/administrador/Proceso')->with('edit', '¡Proceso Actualizado Satisfactoriamente!');
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
