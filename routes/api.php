<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * Aqui se encuentran las rutas api que usaremos dentro de laravel
 */

    // metodo GetAutores
    Route::get("getautores","App\\Http\\Controllers\\AutoresController@GetAutores");
    // metodo GetAlumnos
    Route::get("getalumnos","App\\Http\\Controllers\\AlumnosController@GetAlumnos");
    // metodo getalumno donde recibimos el id dentro de la ruta
    Route::get("getalumno/{id}","App\\Http\\Controllers\\AlumnosController@GetAlumno");
    // metodo updatealumno
    Route::put("updatealumno/{id}","App\\Http\\Controllers\\AlumnosController@UpdateAlumno");
    // metodo deletealumno
    Route::delete("deletealumno/{id}","App\\Http\\Controllers\\AlumnosController@DeleteAlumno");
    // metodo savealumno
    Route::post("savealumno","App\\Http\\Controllers\\AlumnosController@SaveAlumno");

