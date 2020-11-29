<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnidadAcademica;
use Illuminate\Support\Facades\Redirect;
use DB;

class UnidadAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $unidad = DB::table('unidadacademica')->paginate(5);
        if($request){
            $sql=trim($request->get('buscarTexto'));
            $unidades=DB::table('unidadacademica')->where('nombre','like','%'.$sql.'%')
            ->orderBy('id','desc')
            ->paginate(15);
            return view('UnidadAcademica.index',['unidades'=>$unidades,'buscarTexto'=>$sql]);
            // return $unidades;
        }
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
        $unidad = new UnidadAcademica(); 
        $unidad->nombre=$request->nombre;
        $unidad->facultad=$request->facultad;
        $unidad->save();
        return Redirect::to('unidadacademica');
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
        $unidad=DB::table('unidadacademica')->where('id',$id)->first();
        return view('UnidadAcademica.editform',compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $unidad =UnidadAcademica::findOrFail($request->id_unidad); 
        $unidad->nombre=$request->nombre;
        $unidad->facultad=$request->facultad;
        $unidad->save();

        // $unidad= UnidadAcademica::findOrFail($id);
        // $unidad->update($request->all());
        // return Redirect::to('unidadacademica',);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('unidadacademica')->where('id',$id)->delete();
        UnidadAcademica::findOrFail($id)->delete();
        return Redirect::to('unidadacademica');
    }
}
