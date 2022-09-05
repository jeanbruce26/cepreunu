<?php

namespace App\Http\Controllers;

use App\Models\ModalidadPago;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModalidadPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modPago = ModalidadPago::orderBy('id_modalidad_pago','ASC')->paginate(10);
        return view('ModalidadPago.index', compact('modPago'));
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
            'modalidad_pago'  =>  'required|max:200',
            'monto'  =>  'required|max:13',
            'estado'  =>  'required|max:11'
        ]);
        $modPago = ModalidadPago::create($request->all());
        session()->flash('new', '¡Modalidad de Pago Creada Satisfactoriamente!');
        return redirect()->route('ModalidadPago.index');
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
        $modPago = ModalidadPago::find($id);

        $request->validate([
            'modalidad_pago'  =>  'required|max:200',
            'monto'  =>  'required|max:13',
            'estado'  =>  'required|max:11'
        ]);
        $modPago = ModalidadPago::find($id);
        $modPago->update($request->all());
        if($modPago->save()){
            return redirect(to: '/administrador/ModalidadPago')->with('edit', '¡Modalidad de Pago Actualizado Satisfactoriamente!');
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
