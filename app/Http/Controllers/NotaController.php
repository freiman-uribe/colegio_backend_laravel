<?php

namespace App\Http\Controllers;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::all();
        return response()->json($notas);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estudiante_id' => 'required|integer',
            'curso_id' => 'required|integer',
            'materia_id' => 'required|integer',
            'descripcion' => 'required|string',
            'nota' => 'required|numeric'
        ]);

        try {
            $nota = Nota::create($validatedData);
            return response()->json([
                'message' => 'Nota created successfully',
                'data' => $nota
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create Nota',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nota = Nota::findOrFail($id);
        return response()->json($nota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $id;
        $validatedData = $request->validate([
            'estudiante_id' => 'required|integer',
            'curso_id' => 'required|integer',
            'materia_id' => 'required|integer',
            'descripcion' => 'required|string',
            'nota' => 'required|numeric'
        ]);

        try {
            $nota = Nota::findOrFail($id);
            $nota->update($validatedData);
            return response()->json([
                'message' => 'Nota updated successfully',
                'data' => $nota
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update Nota',
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
            $nota = Nota::findOrFail($id);
            $nota->delete();
            return response()->json(['message' => 'Nota deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Nota',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
