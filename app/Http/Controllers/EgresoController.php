<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egreso = Egreso::orderBy('id_egreso','ASC')->paginate(10);
        return view('Egreso.index', compact('egreso'));
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
            'egreso'  =>  'required|max:200',
        ]);
        $egreso = Egreso::create($request->all());
        session()->flash('new', '¡Egreso Creado Satisfactoriamente!');
        return redirect()->route('Egreso.index');
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
        $egreso = Egreso::find($id);

        $request->validate([
            'egreso'  =>  'required|max:4',
        ]);
        $egreso = Egreso::find($id);
        $egreso->update($request->all());
        if($egreso->save()){
            return redirect(to: '/administrador/Egreso')->with('edit', '¡Egreso Actualizado Satisfactoriamente!');
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
