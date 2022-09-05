<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SedeCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sede = Sede::orderBy('id_sede','ASC')->paginate(10);
        return view('Sede.index', compact('sede'));
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
            'sede'  =>  'required|max:200',
            'id_tipo_convenio '  =>  'required'
        ]);
        $sede = Sede::create($request->all());
        session()->flash('new', '¡Sede Creada Satisfactoriamente!');
        return redirect()->route('Sede.index');
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
        $sede = Sede::find($id);

        $request->validate([
            'sede'  =>  'required|max:200',
            'id_tipo_convenio '  =>  'required'
        ]);
        $sede = Sede::find($id);
        $sede->update($request->all());
        if($sede->save()){
            return redirect(to: '/administrador/Sede')->with('edit', '¡Sede Actualizada Satisfactoriamente!');
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
