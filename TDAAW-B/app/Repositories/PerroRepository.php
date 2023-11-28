<?php

namespace App\Repositories;

use App\Models\Perro;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PerroRepository
{
    public function registrarPerro($request)
    {
        try {
            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->foto_url = $request->foto_url;
            $perro->descripcion = $request->descripcion;
            $perro->save();
            
            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function actualizarPerro($id, $request)
{
    try {
        $perro = Perro::find($id);
        
        if (!$perro) {
            return response()->json(["error" => "Perro no encontrado"], Response::HTTP_NOT_FOUND);
        }
        
        $perro->nombre = $request->input('nombre', $perro->nombre);
        $perro->descripcion = $request->input('descripcion', $perro->descripcion);
        $perro->foto_url = $request->input('foto_url', $perro->foto_url);
        $perro->save();
        
        return response()->json(["perro" => $perro], Response::HTTP_OK);
    } catch (Exception $e) {
        Log::info([
            "error" => $e->getMessage(),
            "linea" => $e->getLine(),
            "file" => $e->getFile(),
            "metodo" => __METHOD__
        ]);

        return response()->json([
            "error" => $e->getMessage(),
            "linea" => $e->getLine(),
            "file" => $e->getFile(),
            "metodo" => __METHOD__
        ], Response::HTTP_BAD_REQUEST);
    }
}

    public function listarPerros($request)
    {
        try {
            if (isset($request->limit)) {
                $perros = Perro::orderBy('id', 'ASC')
                    ->take($request->limit)
                    ->get();
            } else {
                $perros = Perro::orderBy('id', 'ASC')
                    ->get();
            }
            
            return response()->json(["perros" => $perros], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ]);
    
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listarPerro($id, $request)
{
    try {
        $perro = Perro::find($id);

        if (!$perro) {
            return response()->json(["mensaje" => "Perro no encontrado"], Response::HTTP_NOT_FOUND);
        }

        return response()->json(["perro" => $perro], Response::HTTP_OK);
    } catch (Exception $e) {
        Log::info([
            "error" => $e->getMessage(),
            "linea" => $e->getLine(),
            "file" => $e->getFile(),
            "metodo" => __METHOD__
        ]);

        return response()->json([
            "error" => $e->getMessage(),
            "linea" => $e->getLine(),
            "file" => $e->getFile(),
            "metodo" => __METHOD__
        ], Response::HTTP_BAD_REQUEST);
    }
}

public function eliminarPerro($id)
{
    try {
        $perro = Perro::find($id);

        if (!$perro) {
            return response()->json(["error" => "Perro no encontrado"], Response::HTTP_NOT_FOUND);
        }

        // Realizar el soft delete estableciendo la fecha y hora actual en la columna 'deleted_at'
        $perro->deleted_at = now();
        $perro->save();

        return response()->json(["perro" => $perro], Response::HTTP_OK);
    } catch (Exception $e) {
        Log::info([
            "error" => $e->getMessage(),
            "linea" => $e->getLine(),
            "file" => $e->getFile(),
            "metodo" => __METHOD__
        ]);

        return response()->json([
            "error" => $e->getMessage(),
            "linea" => $e->getLine(),
            "file" => $e->getFile(),
            "metodo" => __METHOD__
        ], Response::HTTP_BAD_REQUEST);
    }
}
}