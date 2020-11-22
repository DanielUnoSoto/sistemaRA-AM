<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
class UserController extends Controller
{
     //
     public function index(Request $request)
     {
         //
         if($request){
 
             $sql=trim($request->get('buscarTexto'));
             $usuarios=DB::table('users')
             ->join('roles','users.rol','=','roles.id')
             ->select('users.id','users.nombre',
             'users.apellido','users.codsis','users.ci','users.email',
             'users.rol','users.password','roles.rol')
             ->where('users.nombre','LIKE','%'.$sql.'%')
             ->orwhere('users.codsis','LIKE','%'.$sql.'%')
             ->orderBy('users.id','desc')
             ->paginate(15);
 
              /*listar los roles en ventana modal*/
             $roles=DB::table('roles')
             ->select('id','rol')->get(); 
 
             return view('User.index',["usuarios"=>$usuarios,"roles"=>$roles,"buscarTexto"=>$sql]);
         
            //  return $usuarios;
         }      
 
        
     }
 
     public function store(Request $request)
     {
         //
         //if(!$request->ajax()) return redirect('/');
         $user= new User();
         $user->nombre = $request->nombre;
         $user->apellido = $request->apellido;
         $user->codsis = $request->codsis;
         $user->ci = $request->ci;
         $user->rol = $request->rol;
         $user->email = $request->email;
         $user->password = bcrypt( $request->password);
        //  $user->condicion = '1';
        //  $user->idrol = $request->id_rol;  
           
            //  //inicio registrar imagen
            //  //Handle File Upload
            //  if($request->hasFile('imagen')){
 
            //      //Get filename with the extension
            //      $filenamewithExt = $request->file('imagen')->getClientOriginalName();
                 
            //      //Get just filename
            //      $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
                 
            //      //Get just ext
            //      $extension = $request->file('imagen')->guessClientExtension();
                 
            //      //FileName to store
            //      $fileNameToStore = time().'.'.$extension;
                 
            //      //Upload Image
            //      $path = $request->file('imagen')->storeAs('public/img/usuario',$fileNameToStore);
 
             
            //  } else{
 
            //      $fileNameToStore="noimagen.jpg";
            //  }
             
            // $user->imagen=$fileNameToStore;
 
            //  //fin registrar imagen
             $user->save();
             return Redirect::to("user"); 
     }
 
     public function update(Request $request)
     {
         //
         
         $user= User::findOrFail($request->id_usuario);
         $user->nombre = $request->nombre;
         $user->apellido = $request->apellido;
         $user->codsis = $request->codsis;
         $user->ci = $request->ci;
         $user->roles = $request->roles;
         $user->email = $request->email;
         $user->usuario = $request->usuario;
         $user->password = bcrypt($request->password);
         $user->condicion = '1';
         $user->idrol = $request->id_rol;   
            
        //     //Editar imagen
 
        //     if($request->hasFile('imagen')){
 
        //              /*si la imagen que subes es distinta a la que está por defecto 
        //              entonces eliminaría la imagen anterior, eso es para evitar 
        //              acumular imagenes en el servidor*/ 
        //          if($user->imagen != 'noimagen.jpg'){ 
        //              Storage::delete('public/img/usuario/'.$user->imagen);
        //          }
 
                 
        //              //Get filename with the extension
        //          $filenamewithExt = $request->file('imagen')->getClientOriginalName();
                 
        //          //Get just filename
        //          $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
                 
        //          //Get just ext
        //          $extension = $request->file('imagen')->guessClientExtension();
                 
        //          //FileName to store
        //          $fileNameToStore = time().'.'.$extension;
                 
        //          //Upload Image
        //          $path = $request->file('imagen')->storeAs('public/img/usuario',$fileNameToStore);
                 
                 
                 
        //      } else {
                 
        //          $fileNameToStore = $user->imagen; 
        //      }
 
        //         $user->imagen=$fileNameToStore;
 
 
        //   //fin editar imagen
 
           $user->save();
           return Redirect::to("user");
     }
 
     public function destroy(Request $request)
     {
            //  //
            //  $user= User::findOrFail($request->id_usuario);
            
            //   if($user->condicion=="1"){
    
            //          $user->condicion= '0';
            //          $user->save();
            //          return Redirect::to("user");
    
            //     }else{
    
            //          $user->condicion= '1';
            //          $user->save();
            //          return Redirect::to("user");
    
            //      }
     }
}
