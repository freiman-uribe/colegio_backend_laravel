<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CursoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return response()->json($cursos);
    }
    /**
     * Obtener los estudiantes de un curso específico.
     */
    public function estudiantesDelCurso(int $id)
    {
        $curso = Curso::with('estudiantes')->find($id);

        if (!$curso) {
            return response()->json(['error' => 'Curso no encontrado'], 404);
        }

        return response()->json($curso->estudiantes);
    }

    public function materiasDelCurso(int $id)
    {
        $curso = Curso::with('materias')->find($id);

        if (!$curso) {
            return response()->json(['error' => 'Curso no encontrado'], 404);
        }

        return response()->json($curso->materias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'imagen' => 'required|string'
        ]);

        try {
            $curso = Curso::create($validatedData);

            $materia_ids = $request->input('materia_ids');

            foreach ($request->input('materia_ids') as $materia_id) {
                DB::table('curso_materia')->insert([
                    'curso_id' => $curso->id,
                    'materia_id' => $materia_id,
                ]);
            }

            return response()->json([
                'message' => 'Curso created successfully',
                'data' => $curso
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create Curso',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::with(['materias' => function ($query) {
            $query->select('materia_id');
        }])->findOrFail($id);

        $materia_ids = $curso->materias->pluck('materia_id')->toArray();

        $respuesta = [
            'id' => $curso->id,
            'nombre' => $curso->nombre,
            'imagen' => $curso->imagen,
            'materia_ids' => $materia_ids
        ];

        return response()->json($respuesta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $validatedData = $request->validate([
            'nombre' => 'required|string',
            'imagen' => 'required|string'
        ]);

        try {
            $curso = Curso::findOrFail($id);
            $curso->update($validatedData);

            foreach ($request->input('idsAdd') as $idAdd) {
                DB::table('curso_materia')->insert([
                    'curso_id' => $id,
                    'materia_id' => $idAdd,
                ]);
            }
            foreach ($request->input('idsRemove') as $idRemove) {
                DB::table('curso_materia')->where([
                    'curso_id' => $id,
                    'materia_id' => $idRemove,
                ])->delete();
            }
            return response()->json([
                'message' => 'Curso updated successfully',
                'data' => $curso
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update Curso',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return response()->json(['message' => 'Curso deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Curso',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
