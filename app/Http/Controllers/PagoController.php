<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = Pago::orderBy('id_pago','DESC')->paginate(10);
        return view('Pago.index', compact('pago'));
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
            'dni'  =>  'required|min:8',
            'numero_operacion'  =>  'required|numeric',
            'monto'  =>  'required|numeric',
            'fecha_pago'  =>  'required|date',
            'id_modalidad_pago'  =>  'required|numeric',
            'estado'  =>  'required|numeric',
        ]);
        $pago = Pago::create($request->all());
        session()->flash('new', '¡Pago Creado Satisfactoriamente!');
        return redirect()->route('Pago.index');
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
        $pago = Pago::find($id);

        $request->validate([
            'dni'  =>  'required|max:9',
        ]);
        $pago = Pago::find($id);
        $pago->update($request->all());
        if($pago->save()){
            return redirect(to: '/administrador/Pago')->with('edit', '¡Pago Actualizado Satisfactoriamente!');
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
