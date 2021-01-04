<?php

namespace App\Http\Controllers;
use App\Asistencia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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

            $userId=Auth::user()->id;
 
            $sql=trim($request->get('buscarTexto'));
            
            
            

            
            // $hera=$asistencias->first()->herramientas;
            // $herra=json_decode($hera,true);


             /*listar los materias en ventana modal*/
            //  $horarios;

            //Si el usuario es Auxiliar de docencia
             if(Auth::user()->rol==4){

                $asistencias=DB::table('asistencias')
                    ->join('horas','asistencias.hora','=','horas.id')
                    ->join('materias','horas.materia','=','materias.id')
                    // ->join('clases','materias.id','=','clases.materia')
                    ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
                    ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
                    'asistencias.herramientas','asistencias.fecharepo','asistencias.link','horas.dia',
                    'asistencias.tipoclase','asistencias.created_at','horas.hora','asistencias.observacion','asistencias.archivos','asistencias.fecha',
                    'materias.nombre','materias.grupo','unidadacademica.facultad',
                    'unidadacademica.nombre as unidad','materias.id as idmateria')
                    ->where('asistencias.usuario','=',$userId)
                    // ->where('horas.tipo','=','aux')
                    ->where('materias.nombre','LIKE','%'.$sql.'%')
        //            ->where('materias.nombre','LIKE','%'.$sql.'%')
                    // ->orwhere('users.codsis','LIKE','%'.$sql.'%')
                    ->orderBy('asistencias.id','desc')
                    ->paginate(15);

                $horarios=DB::table('horas')
                ->join('materias','horas.materia','=','materias.id')
                ->join('clases','materias.id','=','clases.materia')
                ->select('horas.id','horas.hora','horas.dia','materias.id as materiaid','materias.nombre')
                ->where('clases.user','=',$userId)
                ->where('horas.tipo','=','aux')
                ->get();

                return view('asistencia.index',['materias'=>$horarios,'asistencias'=>$asistencias]);
        
             }else if(Auth::user()->rol==3){

                $asistencias=DB::table('asistencias')
                    ->join('horas','asistencias.hora','=','horas.id')
                    ->join('materias','horas.materia','=','materias.id')
                    // ->join('clases','materias.id','=','clases.materia')
                    ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
                    ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
                    'asistencias.herramientas','asistencias.fecha','asistencias.fecharepo','asistencias.link','horas.dia',
                    'asistencias.tipoclase','asistencias.created_at','horas.hora','asistencias.observacion','asistencias.archivos',
                    'materias.nombre','materias.grupo','unidadacademica.facultad',
                    'unidadacademica.nombre as unidad','materias.id as idmateria')
                    ->where('asistencias.usuario','=',$userId)
                    // ->where('horas.tipo','=','docent')
                    ->where('materias.nombre','LIKE','%'.$sql.'%')
        //            ->where('materias.nombre','LIKE','%'.$sql.'%')
                    // ->orwhere('users.codsis','LIKE','%'.$sql.'%')
                    ->orderBy('asistencias.id','desc')
                    ->paginate(15);

                $horarios=DB::table('horas')
                ->join('materias','horas.materia','=','materias.id')
                ->join('clases','materias.id','=','clases.materia')
                ->select('horas.id','horas.hora','horas.dia','materias.id as materiaid','materias.nombre')
                ->where('clases.user','=',$userId)
                ->where('horas.tipo','=','docent')
                ->get();

                return view('asistencia.index',['materias'=>$horarios,'asistencias'=>$asistencias]);
        
             }else if(Auth::user()->rol==5){
                return view('asistencia.index');
        
             }
            

            if(Auth::user()->rol==2){
             $sql=trim($request->get('buscarTexto'));
             $fechainicio=trim($request->get('fechainicio'));
             $fechafin=trim($request->get('fechafin'));
             
                $asistencias;
                if($fechainicio&&$fechafin){
                    $asistencias=DB::table('asistencias')
                    ->join('horas','asistencias.hora','=','horas.id')
                    ->join('materias','horas.materia','=','materias.id')
                    
                    // ->join('clases','materias.id','=','clases.materia')
                    ->join('users','asistencias.usuario','=','users.id')
                    ->join('roles','users.rol','=','roles.id')
                    ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
                    ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
                    'asistencias.herramientas','asistencias.fecharepo','asistencias.link','asistencias.fecha',
                    'asistencias.tipoclase','asistencias.created_at','asistencias.hora','asistencias.observacion',
                    'materias.nombre as materia','materias.grupo','unidadacademica.facultad','horas.dia',
                    'unidadacademica.nombre as unidad','materias.id as idmateria','users.nombre','users.apellido','users.codsis','roles.rol')
                    // ->where('clases.user','=',$userId)
                    // ->where('materias.nombre','LIKE','%'.$sql.'%')
                    ->whereBetween('asistencias.fecha', [$fechainicio, $fechafin])
                    // ->groupBy('asistencias.id','users.nombre')
                    ->orderBy('asistencias.id','desc')
                    ->paginate(15);



                }else{
                    $asistencias=DB::table('asistencias')
                    ->join('horas','asistencias.hora','=','horas.id')
                    ->join('materias','horas.materia','=','materias.id')
                    
                    // ->join('clases','materias.id','=','clases.materia')
                    ->join('users','asistencias.usuario','=','users.id')
                    ->join('roles','users.rol','=','roles.id')
                    ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
                    ->select('asistencias.id','asistencias.contenido','asistencias.plataforma',
                    'asistencias.herramientas','asistencias.fecharepo','asistencias.link','asistencias.fecha',
                    'asistencias.tipoclase','asistencias.created_at','asistencias.hora','asistencias.observacion',
                    'materias.nombre as materia','materias.grupo','unidadacademica.facultad','horas.dia',
                    'unidadacademica.nombre as unidad','materias.id as idmateria','users.nombre','users.apellido','users.codsis','roles.rol')
                    // ->where('clases.user','=',$userId)
                
                    // ->groupBy('asistencias.id','users.nombre')
                    ->orderBy('asistencias.id','desc')
                    ->paginate(15);

                    
                }
                   $contador=0;
                   foreach($asistencias as $asi){
                        if($asi->fecharepo){
                            $contador++;
                        }
                   }
                
                return view('asistencia.index',['asistencias'=>$asistencias,'fechainicio'=>$fechainicio,'fechafin'=>$fechafin,'contador'=>$contador]);
                    // return $contador;
                    //  return $asistencias;
            }
            
            // $herramientasString="hola mundo<br>casa<br>Saludos<br>hola mundo<br>casa<br>Saludos<br>";
            // return view('User.index',["usuarios"=>$usuarios,"horarios"=>$horarios,"buscarTexto"=>$sql]);

           
            // return $asistencias;
        }

        // return $request->all();
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

        // Query para obtener las horas 
             $horarios=DB::table('horas')
            ->join('materias','horas.materia','=','materias.id')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('horas.id','horas.hora','horas.dia','materias.nombre','materias.grupo','unidadacademica.nombre as unidad','unidadacademica.facultad')
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
        $this->validate($request, [
            'herramientas' => 'required',
            'contenido'=>'required',
            // 'body' => 'required',
        ]);

        
        $he=($request->get('herramientas'));
        $cadena=array_keys($he) ;
        $cadenaTexto = implode(", ", $cadena);
        // $cadenatxt=json_encode($cadena);
        // $cad=null;
        // $tam= count($cadena);
        // for ($i=0; $i<$tam; $i++) { 
        //     $cad=$cad."$cadena[$i]<br>";
        // }
        $asistencia= new Asistencia();
        $asistencia->usuario = $request->usuario;
        $asistencia->hora = $request->horaId;
        $asistencia->fecha = $request->fecha;
        $asistencia->tipoclase = $request->tipoclase;
        $asistencia->contenido = $request->contenido;
        $asistencia->plataforma = $request->plataforma;
        $asistencia->observacion = $request->observacion;
        $asistencia->herramientas =$cadenaTexto;
        $asistencia->fechaRepo = $request->fechaReposicion;
        $asistencia->link =  $request->link;
        // $asistencia->archivos =  $request->archivo;
        // $asistencia->archivos =  $request->chek;

         //Handle File Upload
         if($request->hasFile('archivo')){

            //Get filename with the extension
            $filenamewithExt = $request->file('archivo')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            
            //Get just ext
            $extension = $request->file('archivo')->guessClientExtension();
            
            //FileName to store
            $fileNameToStore = time().'.'.$extension;
            
            //Upload Image
            $path = $request->file('archivo')->storeAs('public/archivos',$fileNameToStore);
    
            $asistencia->archivos=$fileNameToStore;
           
            } 
            // else{
    
            //     $fileNameToStore="noimagen.jpg";
            // }
            
            

            $asistencia->save();
            return Redirect::to("asistencias"); 
    
        // return $asistencia;
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
    public function generarReportePdf(Request $request){

        $fechaini=($request->get('fechainicio'));
        $fechafin=($request->get('fechafin'));


        // if($fechaini&&$fechafin){
        //      $reporte=DB::table('clases')
        //     ->join('users','clases.user','=','users.id')
        //     ->join('materias','clases.materia','=','materias.id')
        //     ->join('horas','horas.materia','=','materias.id')
        //     ->join('asistencias','asistencias.hora','=','horas.id')
        //     ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
        //     ->select('users.nombre','users.apellido',
        //     'materias.id as IDmateria','materias.nombre as materia',
            
        //     'unidadacademica.facultad','unidadacademica.nombre as unidad',DB::raw('count(asistencias.id) as totalRegistro') 
        //     )
        //     ->groupBy('users.nombre','users.apellido','materias.id','materias.nombre',
        //     'unidadacademica.facultad','unidadacademica.nombre')
        //     ->whereBetween('asistencias.fecha', [$fechaini, $fechafin])->get();
        // }else{
           if($fechaini&&$fechafin){
            $reporte=DB::table('asistencias')
            ->join('users','asistencias.usuario','=','users.id')
            // ->join('materias','clases.materia','=','materias.id')
            ->join('horas','asistencias.hora','=','horas.id')
            ->join('materias','materias.id','=','horas.materia')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('users.nombre','users.apellido',
            'materias.id as IDmateria','materias.nombre as materia',
            
            'unidadacademica.facultad','unidadacademica.nombre as unidad',DB::raw('count(asistencias.id) as totalRegistro'),DB::raw('count(asistencias.id)*2 as cargaHoraria')
            )
            ->whereBetween('asistencias.fecha', [$fechaini, $fechafin])
            ->groupBy('users.nombre','users.apellido','materias.id','materias.nombre',
            'unidadacademica.facultad','unidadacademica.nombre')->get();
           }else{
            $reporte=DB::table('asistencias')
            ->join('users','asistencias.usuario','=','users.id')
            ->join('horas','asistencias.hora','=','horas.id')
            ->join('materias','materias.id','=','horas.materia')
            // ->join('materias','clases.materia','=','materias.id')
            ->join('unidadacademica','materias.unidad','=','unidadacademica.id')
            ->select('users.nombre','users.apellido',
            'materias.id as IDmateria','materias.nombre as materia',
            
            'unidadacademica.facultad','unidadacademica.nombre as unidad',DB::raw('count(asistencias.usuario) as totalRegistro'),DB::raw('count(asistencias.usuario)*2 as cargaHoraria')
            )
            // ->whereBetween('asistencias.fecha', [$fechaini, $fechafin])
            ->groupBy('users.nombre','users.apellido','materias.id','materias.nombre',
            'unidadacademica.facultad','unidadacademica.nombre')->get();
           }
        // }
        
        // ->where('horas.id',')->get();
        // return view('pdf.reporte',['asistencias'=>$reporte]);
        return \PDF::loadView('pdf.reporte',['asistencias'=>$reporte,'fechainicio'=>$fechaini,'fechafin'=>$fechafin])->setPaper('A4')->stream('control_asistencia.pdf');
        // return $reporte;
    }
    public function auxiliar(Request $request){
          
        return  $request->all();
    }
}
