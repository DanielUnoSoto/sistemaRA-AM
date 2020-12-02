<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request){
 
            // $sql=trim($request->get('buscarTexto'));
            // $usuarios=DB::table('users')
            // ->join('roles','users.rol','=','roles.id')
            // ->select('users.id','users.nombre',
            // 'users.apellido','users.codsis','users.ci','users.email',
            // 'users.rol','users.password','roles.rol')
            // ->where('users.nombre','LIKE','%'.$sql.'%')
            // ->orwhere('users.codsis','LIKE','%'.$sql.'%')
            // ->orderBy('users.id','desc')
            // ->paginate(15);

             /*listar los materias en ventana modal*/
            $userId=Auth::user()->id;

            $horarios=DB::table('horas')
            ->join('materias','horas.materia','=','materias.id')
            ->join('clases','materias.id','=','clases.materia')
            ->select('horas.id','hora','dia','materias.nombre')
            ->where('clases.user_id','=',$userId)->get(); 
            

            // return view('User.index',["usuarios"=>$usuarios,"horarios"=>$horarios,"buscarTexto"=>$sql]);
            return view('asistencia.index',['materias'=>$horarios]);
        
            // return $horarios;
        }
        // $herramientas=['Google Docs','Google spreadshet','Google Meet','Zoom','Exel Microsof','Dashboar Google','Pisarra zoom'];
        // $materia=['Fisica','Quimica','Biologia','Calculo'];
        // return view('asistencia.index',['materias'=>$materia,'herramientas'=>$herramientas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request){
        $materia=trim($request->get('materia'));
        
        // $usuarios=DB::table('users')
        //     ->join('roles','users.rol','=','roles.id')
        //     ->select('users.id','users.nombre',
        //     'users.apellido','users.codsis','users.ci','users.email',
        //     'users.rol','users.password','roles.rol')
        //     ->where('users.nombre','LIKE','%'.$sql.'%')
        //     ->orwhere('users.codsis','LIKE','%'.$sql.'%')
        //     ->orderBy('users.id','desc')
        //     ->paginate(15);

        // Query para obtener las horas 
             $horarios=DB::table('horas')
            ->join('materias','horas.materia','=','materias.id')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('horas.id','hora','dia','materias.nombre','materias.grupo','unidadacademica.nombre as unidad','unidadacademica.facultad')
            ->where('horas.id','=',$materia)->get();

            //Query para obtener las herramientas
            $herramientas=DB::table('herramientas')
            ->select('id','nombre as herramienta')->get();

            return view('asistencia.create',['horarios'=>$horarios,'herramientas'=>$herramientas]);
           }
        // return $horarios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('asistencia.create');
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
        return view('asistencia.edit');
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
