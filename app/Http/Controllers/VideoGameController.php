<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\VideoGame;
use Illuminate\Support\Facades\DB;

class VideoGameController extends Controller
{
    public function registrarVideojuego(Request $request)
    {
        $videoGameValidator = Validator::make($request->all(), [
            "nombre" => 'required',
            "descripcion" => 'required',
            "produccion" => 'required',
            "anio_creacion",
            "img",
        ]);

        if (!$videoGameValidator->fails()) {
            $result = VideoGame::insert([
                "nombre" => $request['nombre'],
                "descripcion" => $request['descripcion'],
                "produccion" => $request['produccion'],
                "anio_creacion" => $request['anio_creacion'],
                "img" => $request['anio_creacion']
            ]);

            if ($result) {
                return response()->json([
                    'status' => 1,
                    'message' => '¡Se ha creado el videojuego con exito!'
                ]);
            }
            return response()->json([
                'status' => 0,
                'message' => 'Opps ha ocurrido un error al intentar crear el video juego'
            ]);
        }
    }

    public function consultarVideojuegos()
    {
        $videoGames = VideoGame::all();
        return response()->json([
            'status' => 1,
            'message' => 'Se han obtenido los juegos con exito',
            'videoGames' => $videoGames
        ]);
    }

    public function obtenerVideojuego(Request $request)
    {
        $userValidator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        #Si los campos estan llenos como corresponde
        if (!$userValidator->fails()) {
            #Buscamos el VideoJuego que vamos a seleccionar
            $searchVideoGame = VideoGame::where('id', $request['id'])->first();

            if ($searchVideoGame) {
                #Devolvemos una respuesta satisfactoria
                return response()->json([
                    'status' => 1,
                    'message' => "¡Se ha obtenido el video juego con exito!",
                    'videoJuego' => $searchVideoGame
                ]);
            }
            else {
                return response()->json([
                    'status' => 0,
                    'message' => 'VideoJuego aún no registrado en el sistema.'
                ]);
            }
        #Si hay inconvenientes con los campos 
        }
        else {
            #Mostramos los inconvenientes
            return response()->json([
                'status' => 0,
                'errors' => $userValidator->messages()
            ]);
        }
    }

    public function eliminarVideojuego(Request $request)
    {
        $userValidator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        #Si los campos estan llenos como corresponde
        if (!$userValidator->fails()) {
            #Buscamos el videoJuego que vamos a eliminar
            $searchUser = VideoGame::where('id', $request['id'])->first();

            if ($searchUser) {
                $result = VideoGame::where('id', '=', $request['id'])->delete();

                #Si la consulta se ejecuto
                if ($result) {
                    #Devolvemos una respuesta satisfactoria
                    return response()->json([
                        'status' => 1,
                        'message' => "¡Se ha eliminado el Video juego con exito!"
                    ]);
                }
            }
            else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Videojuego aún no registrado en el sistema.'
                ]);
            }

        #Si hay inconvenientes con los campos 
        }
        else {
            #Mostramos los inconvenientes
            return response()->json([
                'status' => 0,
                'errors' => $userValidator->messages()
            ]);
        }
    }

    public function editarVideoJuego(Request $request)
    {
        $videoGameValidator = Validator::make($request->all(), [
            "nombre" => 'required',
            "descripcion" => 'required',
            "produccion" => 'required',
            "anio_creacion",
            "img",
        ]);

        if (!$videoGameValidator->fails()) {
            #Buscamos el video juego que vamos a editar
            $searchUser = VideoGame::where('id', $request['id'])->first();

            if ($searchUser) {
                $result = VideoGame::where('id', $request['id'])
                    ->update([
                    "nombre" => $request['nombre'],
                    "descripcion" => $request['descripcion'],
                    "produccion" => $request['produccion'],
                    "anio_creacion" => $request['anio_creacion'],
                    "img" => $request['anio_creacion']
                ]);

                #Si la consulta es exitosa
                if ($result) {
                    #Devolvemos una respuesta satisfactoria
                    return response()->json([
                        'status' => 1,
                        'message' => "¡Se ha actualizado el video juego con exito!"
                    ]);
                }
            }
            else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Video juego aún no registrado en el sistema.'
                ]);
            }

        #Si hay inconvenientes con los campos 
        }
        else {
            #Mostramos los inconvenientes
            return response()->json([
                'status' => 0,
                'errors' => $videoGameValidator->messages()
            ]);
        }
    }
}
