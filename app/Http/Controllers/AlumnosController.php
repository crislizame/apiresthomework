<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /*
    * ruta /api/getalumnos
    * GET
    */
    function GetAlumnos(){
        //funcion GetAlumnos
        $alumnos = Alumno::all(); //obtenemos todos los alumnos de la base de datos
        //respondemos con un json los alumnos obtenidos
        return response()->json($alumnos,200,[], JSON_UNESCAPED_UNICODE);
    }
    /*
    * ruta /api/getalumno/{id}
    * GET
    */
    function GetAlumno($id){
        //funcion getalumno
        $alumno = Alumno::find($id); //obtenemos el alumno de la base de datos
        //respondemos con un json el alumno obtenido
        return response()->json($alumno,200,[], JSON_UNESCAPED_UNICODE);
    }
    /*
    * ruta /api/deletealumno/{id}
    * DELETE
    */
    function DeleteAlumno($id){
        //funcion DeleteAlumno
        $response = [];
        try{
            Alumno::where("id",$id)->delete(); //eliminamos el usuario por el id
            $response['result'] = true;
        }catch (\Exception $e){
            $response['result'] = false;
            $response['mensaje'] = $e->getMessage();

        }

        return response()->json($response,200,[], JSON_UNESCAPED_UNICODE);
    }
    /*
    * ruta /api/updatealumno/{id}
    * PUT
    */
    function UpdateAlumno(Request $request,$id){
        //funcion UpdateAlumno
        $existe = Alumno::where("id",$id)->count(); //validamos que exista el usuario
        $response = []; //variable de respuesta
        if($existe > 0){
            $alumno = new Alumno(); //inicializamos el modelo
            $alumno->exists = true; //decimos que existe el usuario
            $alumno->id = $id; // le decimos cual es el usuario por mdio del id
            if(!is_null($request->nombre)){
                $alumno->nombre = $request->nombre;
            }
            if(!is_null($request->apellidos)){
                $alumno->apellidos = $request->apellidos;
            }
            if(!is_null($request->carnet)){
                $alumno->carnet = $request->carnet;
            }
            $alumno->save(); //actualizamos el alumno
            $alumno = Alumno::find($id);
            $response['result'] = true; // decimos que resultado es verdadero si se actualizo el usuario correctamente
            $response['alumno'] = $alumno; //y le mandamos el alumno actualizado
        }else{
            $response['result'] = false; // y enviamos false si no existe el alumno
            $response['alumno'] = null; // enviamos un null porque no tenemos ningun alumno actualizado
        }

        return response()->json($response,200,[], JSON_UNESCAPED_UNICODE);
    }
    /*
    * ruta /api/savealumno
    * POST
    */
    function SaveAlumno(Request $request){
        //funcion SaveAlumno
        $response = []; //variable de respuesta
        try{
            $alumno = new Alumno(); //inicializamos el modelo
            $alumno->nombre = $request->nombre;
            $alumno->apellidos = $request->apellidos;
            $alumno->carnet = $request->carnet;
            $alumno->save(); //guardamos el alumno

            $response['result'] = true; // decimos que resultado es verdadero si se guardo el alumno correctamente
            $response['alumno'] = $alumno; //y le mandamos el alumno guardado

        }catch (\Exception $e){
            $response['result'] = false; // y enviamos false si hubo un error
            $response['alumno'] = null; // enviamos un null porque no tenemos ningun alumno guardao
            $response['mensaje'] = $e->getMessage(); // el mensaje de eerror

        }


        return response()->json($response,200,[], JSON_UNESCAPED_UNICODE);
    }
}
