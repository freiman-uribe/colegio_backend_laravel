<?php

namespace App\Http\Controllers;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return response()->json($materias);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
        ]);

        try {
            $materia = Materia::create($validatedData);
            return response()->json([
                'message' => 'Materia created successfully',
                'data' => $materia
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create Materia',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materia = Materia::findOrFail($id);
        return response()->json($materia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $validatedData = $request->validate([
            'nombre' => 'required|string',
        ]);

        try {
            $materia = Materia::findOrFail($id);
            $materia->update($validatedData);
            return response()->json([
                'message' => 'Materia updated successfully',
                'data' => $materia
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update Materia',
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
            $materia = Materia::findOrFail($id);
            $materia->delete();
            return response()->json(['message' => 'Materia deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Materia',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
