<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use Illuminate\Support\Facades\Redirect;
use DB;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias=DB::table('materias')
        ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
        ->select('materias.id','materias.nombre as materia','materias.grupo',
        'unidadacademica.nombre as unidad','unidadacademica.facultad') 
        ->orderBy('materias.id','desc')
        ->paginate(10);

        //Obtenencion de las unidades 
        $unidades=DB::table('unidadacademica')->get();
        return view('materia.index',['materias'=>$materias,'unidades'=>$unidades]);
    //    return $materias;
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
        $materia = new Materia(); 
        $materia->nombre=$request->nombre;
        $materia->grupo=$request->grupo;
        $materia->unidad=$request->unidad;
        $materia->save();
        return Redirect::to('materias');
        // return $materia;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function destroy($id)
    {
        Materia::findOrFail($id)->delete();
        return Redirect::to('materias',);
    }
}
