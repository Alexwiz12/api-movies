<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // GET /movies
    public function index()
    {
        return Movie::all();
    }

    // GET /movies/{id}
    public function show($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['mensaje' => 'Película no encontrada'], 404);
        }

        return $movie;
    }

    // POST /movies
    public function store(Request $request)
    {
        $movie = Movie::create($request->all());

        return response()->json([
            'mensaje' => 'Película agregada',
            'data' => $movie
        ], 201);
    }

    // PUT /movies/{id}
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['mensaje' => 'Película no encontrada'], 404);
        }

        $movie->update($request->all());

        return response()->json([
            'mensaje' => 'Película actualizada',
            'data' => $movie
        ]);
    }

    // DELETE /movies/{id}
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['mensaje' => 'Película no encontrada'], 404);
        }

        $movie->delete();

        return response()->json([
            'mensaje' => 'Película eliminada'
        ]);
    }
}
