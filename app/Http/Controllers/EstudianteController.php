<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiants = Estudiante::all();
        return response()->json($estudiants);
    }


    public function notasDeEstudianteYCursospecifico(int $estudianteId, int $cursoId)
    {
        $estudiante = Estudiante::with(['notas.materia.cursos'])->where('id', $estudianteId)->firstOrFail();

        $notasPorCurso = $estudiante->notas->filter(function ($nota) use ($cursoId) {
            return $nota->curso_id == $cursoId;
        });

        $resultados = [
            'nombre_curso' => '',
            'materias' => [],
            'nombre_estudiante' => $estudiante->nombre
        ];

        foreach ($notasPorCurso as $nota) {
            $materia = $nota->materia;
            $curso = $materia->cursos->where('id', $cursoId)->first();

            if (empty($resultados['nombre_curso']) && $curso) {
                $resultados['nombre_curso'] = $curso->nombre;
            }

            if (!isset($resultados['materias'][$materia->id])) {
                $resultados['materias'][$materia->id] = [
                    'materia_id' => $materia->id,
                    'nombre_materia' => $materia->nombre,
                    'notas' => []
                ];
            }

            $resultados['materias'][$materia->id]['notas'][] = [
                'id' => $nota->id,
                'valor' => $nota->nota,
                'descripcion' => $nota->descripcion
            ];
        }

        $resultados['materias'] = array_values($resultados['materias']);

        return response()->json($resultados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'curso_id' => 'required|integer'
        ]);

        try {
            $estudiant = Estudiante::create($validatedData);
            return response()->json([
                'message' => 'Estudiante created successfully',
                'data' => $estudiant
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create Estudiante',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudiant = Estudiante::findOrFail($id);
        return response()->json($estudiant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $id;
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'curso_id' => 'required|integer'
        ]);

        try {
            $estudiant = Estudiante::findOrFail($id);
            echo $estudiant;
            $estudiant->update($validatedData);
            return response()->json([
                'message' => 'Estudiante updated successfully',
                'data' => $estudiant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update Estudiante',
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
            $estudiant = Estudiante::findOrFail($id);
            $estudiant->delete();
            return response()->json(['status' => 200, 'message' => 'Estudiante deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Estudiante',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
