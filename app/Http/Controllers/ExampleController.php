<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Example; // Asegúrate de que el modelo esté en la ruta correcta

class ExampleController extends Controller
{
    public function index()
    {
        return Example::all(); // Devuelve todos los registros
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $example = Example::create($validated);

        return response()->json($example, 201);
    }

    public function show($id)
    {
        $example = Example::find($id);

        if (!$example) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return $example;
    }

    public function update(Request $request, $id)
    {
        $example = Example::find($id);

        if (!$example) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $example->update($validated);

        return $example;
    }

    public function destroy($id)
    {
        $example = Example::find($id);

        if (!$example) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $example->delete();

        return response()->json(['message' => 'Deleted'], 200);
    }
}
