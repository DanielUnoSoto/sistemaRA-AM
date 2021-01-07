<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
$datos;
class PersonalAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
        

        if($request){
            $sql=trim($request->get('buscarTexto'));
            // $personal=DB::table('users')
            // ->join('roles','users.rol','=','roles.id')
            // ->select('users.id','users.nombre','users.apellido','users.codsis','users.ci','users.email','roles.rol')

            // ->where('users.nombre','like','%'.$sql.'%')
            // ->where('users.rol','=',3)
            // ->orwhere('users.rol','=',4)
            // ->orwhere('users.rol','=',5)                      
            // ->paginate(3);

            $jefe=Auth::user()->id;
            // echo $jefe;
            $unidad=DB::table('unidadacademica')
            ->select('unidadacademica.id')
            ->where('unidadacademica.jefe','=',$jefe)->first();
            // echo $unidad->id;
            
            $personal=DB::table('materias')
            ->join('clases','clases.materia','=','materias.id')
            ->join('users','users.id','=','clases.user')
            ->join('roles','users.rol','=','roles.id')
            ->select('users.id','users.nombre','users.apellido','users.codsis','users.ci','users.email','roles.rol')
            ->where('materias.unidad',$unidad->id)
            ->where('users.nombre','like','%'.$sql.'%')
            ->groupBy('users.id','users.nombre','users.apellido','users.codsis','users.ci','users.email','roles.rol')
            ->paginate(5);

           return view('PersonalAcademico.index',['usuarios'=>$personal,'buscarTexto'=>$sql]);
            // return $personal;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id ,Request $request)
    {
        global $datos;
        $datos=$request;

        // $sql=trim($request->get('buscarTexto'));
        // $personal=DB::table('asistencias')
        // // ->where('users.nombre','like','%'.$sql.'%')
        // ->where('asistencias.plataforma','=','classroom')
        // // ->orwhere('users.rol','=',4)
        // // ->orwhere('users.rol','=',5)
        // ->paginate(3);
        // return $personal;
        // if($request){
            //Obteniendo fechas para el filtro
            $fechaini=trim($request->get('fechainicio'));
            $fechafin=trim($request->get('fechafin'));
 
            $sql=trim($request->get('buscarTexto'));

            $personal=DB::table('users')->where('users.id','=',$id)->get();

            // $asistencias=DB::table('asistencias')
            // ->join('horas','asistencias.hora','=','horas.id')
            // ->join('materias','horas.materia','=','materias.id')
            // ->join('clases','materias.id','=','clases.materia')
            // ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            // ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
            // 'asistencias.herramientas','asistencias.fecharepo','asistencias.fecha','asistencias.link',
            // 'asistencias.tipoclase','asistencias.created_at','asistencias.hora','asistencias.observacion',
            // 'horas.dia','horas.hora','materias.nombre','materias.grupo','unidadacademica.facultad',
            // 'unidadacademica.nombre as unidad','materias.id as idmateria')
            // ->where('clases.user','=',$id)
            // ->orwhereBetween('asistencias.fecha', [$fechaini, $fechafin])
            // ->orwhere('materias.nombre','LIKE','%'.$sql.'%')
            
            // ->orderBy('asistencias.id','desc')
            // ->paginate(15);
        //     $hera=$asistencias->first()->herramientas;
        //     $herra=json_decode($hera,true);
             /*listar los materias en ventana modal*/
            // $userId=Auth::user()->id;

            // $horarios=DB::table('horas')
            // ->join('materias','horas.materia','=','materias.id')
            // ->join('clases','materias.id','=','clases.materia')
            // ->select('horas.id','hora','dia','materias.id as materiaid','materias.nombre')
            // ->where('clases.user','=',$userId)->get(); 
            
            // $herramientasString="hola mundo<br>casa<br>Saludos<br>hola mundo<br>casa<br>Saludos<br>";
            // return view('User.index',["usuarios"=>$usuarios,"horarios"=>$horarios,"buscarTexto"=>$sql]);

            // return view('PersonalAcademico.show',['asistencias'=>$asistencias,'iduser'=>$id]);
            $asistencias;

            if(!$fechaini||!$fechafin){

                $jefe=Auth::user()->id;
                // echo $jefe;
                $unidad=DB::table('unidadacademica')
                ->select('unidadacademica.id')
                ->where('unidadacademica.jefe','=',$jefe)->first();

                global $asistencias;
                // $sql=trim($request->get('buscarTexto'));
                $asistencias=DB::table('asistencias')
            ->join('horas','asistencias.hora','=','horas.id')
            ->join('materias','horas.materia','=','materias.id')
            // ->join('clases','materias.id','=','clases.materia')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
            'asistencias.herramientas','asistencias.fecharepo','asistencias.fecha','asistencias.link',
            'asistencias.tipoclase','asistencias.created_at','asistencias.hora','asistencias.observacion',
            'horas.dia','horas.hora','materias.nombre','materias.grupo','unidadacademica.facultad',
            'unidadacademica.nombre as unidad','materias.id as idmateria')
            // ->orwhereBetween('asistencias.fecha', [$fechaini, $fechafin])
            // ->where(function($query){
            //      global $id,$sql;
            //         $query->where('clases.user','=',$id);
            //             //   ->where('materias.nombre','LIKE','%'.$sql.'%');
            //             //   ->where('asistencias.tipoclase','LIKE','%'.$sql.'%');
            // })
            // ->where('materias.nombre','LIKE','%'.$sql.'%')
            // ->orwhere('asistencias.tipoclase','LIKE','%'.$sql.'%')
            ->where('materias.unidad','=',$unidad->id)
            ->where('asistencias.usuario','=',$id)

            // ->where(function($query){
            //          global $id,$sql;
            //             $query->where('materias.nombre','LIKE','%'.$sql.'%')
            //                   ->orWhere('asistencias.tipoclase','LIKE','%'.$sql.'%');
            //     })
            ->where('materias.nombre','LIKE','%'.$sql.'%')
            // ->orWhere('asistencias.tipoclase','LIKE','%'.$sql.'%')
            ->orderBy('materias.nombre','desc')
            
            // ->orderBy('asistencias.tipoclase','desc')
            ->paginate(15);
            }else{
                global $asistencias;
                $sql=trim($request->get('buscarTexto'));
            $asistencias=DB::table('asistencias')
            ->join('horas','asistencias.hora','=','horas.id')
            ->join('materias','horas.materia','=','materias.id')
            // ->join('clases','materias.id','=','clases.materia')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
            'asistencias.herramientas','asistencias.fecharepo','asistencias.fecha','asistencias.link',
            'asistencias.tipoclase','asistencias.created_at','asistencias.hora','asistencias.observacion',
            'horas.dia','horas.hora','materias.nombre','materias.grupo','unidadacademica.facultad',
            'unidadacademica.nombre as unidad','materias.id as idmateria')
            ->where('asistencias.usuario','=',$id)
            ->whereBetween('asistencias.fecha', [$fechaini, $fechafin])
            // ->orwhere('ma terias.nombre','LIKE','%'.$sql.'%')
            
            ->orderBy('asistencias.fecha','desc')
            ->paginate(15);
            }

            return view('PersonalAcademico.show',['asistencias'=>$asistencias,'iduser'=>$id,'fechainicio'=>$fechaini,'fechafin'=>$fechafin,'personal'=>$personal,'buscarTexto'=>$sql]);
        // }
            // return $datos->all();
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

    public function generarPdf(Request $request){


        // $user = Users::join('categorias','productos.idcategoria','=','categorias.id')
        // ->select('productos.id','productos.idcategoria','productos.codigo','productos.nombre','categorias.nombre as nombre_categoria','productos.stock','productos.condicion')
        // ->orderBy('productos.nombre', 'desc')->get(); 
        $unidades=DB::table('unidadacademica')
        ->orderBy('id','desc')
        ->paginate(10);

        
        // return $productos;
        // $cont=DB::table('unidadacademica')->count();
        $sql=trim($request->get('buscarTexto'));
        $fechaini=trim($request->get('fechainicio'));
        $fechafin=trim($request->get('fechafin'));
        $id=trim($request->get('iduser'));
        // global $datos;
        $personal=DB::table('users')->where('users.id','=',$id)->get();
        // $cont=DB::table('users')->where('users.id','=',$id)->cont();
        
        $asistencias=$this->show($id,$request)->asistencias;
        
        $contador=0;
                   foreach($asistencias as $asi){
                        if($asi->fecharepo){
                            $contador++;
                        }
                   }
        // // $producto=json_decode($sql);
        // return $contador;
        return \PDF::loadView('pdf.auditoria',['asistencias'=>$asistencias,'fechainicio'=>$fechaini,'fechafin'=>$fechafin,'personal'=>$personal,'contador'=>$contador])->setPaper('legal', 'landscape')->stream('control_asistencia.pdf');
        // return $pdf->download('productos.pdf');
        // $datos;

        // return $asistencias;
      
    }
}
