<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carre = Carrera::orderBy('id_carrera','ASC')->paginate(10);
        return view('Carrera.index', compact('carre'));
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
            'carrera'  =>  'required|max:200',
        ]);
        $carre = Carrera::create($request->all());
        session()->flash('new', '¡Carrera Creada Satisfactoriamente!');
        return redirect()->route('Carrera.index');
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
        $carre = Carrera::find($id);

        $request->validate([
            'carrera'  =>  'required|max:200',
        ]);
        $carre = Carrera::find($id);
        $carre->update($request->all());
        if($carre->save()){
            return redirect(to: '/administrador/Carrera')->with('edit', '¡Carrera Actualizada Satisfactoriamente!');
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
