<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Clase;
use DB;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function index(Request $request)
    {
        if($request){
 
            $sql=trim($request->get('buscarTexto'));

            $clases=DB::table('clases')
            ->join('materias','clases.materia','=','materias.id')
            ->join('users','clases.user','=','users.id')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('users.nombre','users.apellido',
        
            'materias.grupo','materias.unidad','materias.nombre as matery','unidadacademica.nombre as unidad','unidadacademica.facultad')
            ->where('users.nombre','LIKE','%'.$sql.'%')
            ->orwhere('users.codsis','LIKE','%'.$sql.'%')
            ->orderBy('clases.id','desc')
            ->paginate(15);

             /*listar los user en ventana modal*/
             $users=DB::table('users')
             ->select('id','nombre','apellido')
             ->where('users.rol',3)
             ->orwhere('users.rol',4)
            //  ->orwhere('users.rol',5)
             ->get(); 

             /*listar los materias en ventana modal*/
             $materias=DB::table('materias')
             ->select('id','nombre','grupo')->get(); 
             
            return view('Clase.index',["clases"=>$clases,"users"=>$users,"materias"=>$materias,"buscarTexto"=>$sql]);
        
            // return $clases;
        }      


        // if($request){
        //     $sql=trim($request->get('buscarTexto'));
        //     $clases=DB::table('clases')->where('user','like','%'.$sql.'%')
        //     ->orderBy('id','desc')
        //     ->paginate(15);
        //     // return view('Clases.index',['clases'=>$clases,'buscarTexto'=>$sql]);
        //     return $clases;
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $clases= new Clase();
        $clases->materia = $request->materia;
        $clases->user = $request->personal;
        $clases->save();
        return Redirect::to("clases"); 

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
        //
    }
}
