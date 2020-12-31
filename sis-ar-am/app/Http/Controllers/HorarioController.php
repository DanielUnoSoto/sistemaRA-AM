<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hora;
use Illuminate\Support\Facades\Redirect;

use DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $horarios = new Hora(); 
        $horarios->hora=$request->hora;
        $horarios->dia=$request->dia;
        $horarios->tipo=$request->tipo;
        $horarios->materia=$request->materia;
        $horarios->save();
       return redirect()->route('horarios.show',$request->materia);
        // return Redirect::to(route('horarios.show'));
        // return $horarios;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horarios=DB::table('horas')
        ->join('materias','horas.materia','=','materias.id')
        ->select('horas.id','horas.hora','horas.dia','horas.materia','horas.tipo',
        'materias.nombre')
        ->where('horas.materia','=',$id)
        ->paginate(5);
        //Obtencion de nombre de la materia
        $materia=DB::table('materias')->where('materias.id','=',$id)->first();
        // echo $materia->nombre;
        // return $horarios;
        return view('horarios.index',['horarios'=>$horarios,'materia'=>$materia]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Hora::findOrFail($id)->delete();
        // return $id;
        // return Redirect::to('horarios');
        return redirect()->route('horarios.show',$request->idmateria);
    }
}
