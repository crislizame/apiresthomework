<?php

namespace App\Http\Controllers;

use App\Models\Autor;

class AutoresController extends Controller
{
    /*
     * ruta /api/getautores
     * GET
     */
    function GetAutores(){
        //funcion getAutores
        $autor = Autor::first(); //obtenemos autor de la base de datos
        //respondemos con un json el autor obtenido
        return response()->json($autor,200,[], JSON_UNESCAPED_UNICODE);
    }
}
