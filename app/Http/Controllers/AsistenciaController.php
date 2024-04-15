<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitado; // Asegúrate de que este sea el nombre correcto de tu modelo

class AsistenciaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'radio-group' => 'required|boolean',
            'guest' => 'required|integer',
        ]);

        $invitado = new Invitado;
        $invitado->name = $validatedData['name'];
        $invitado->email = $validatedData['email'];
        $invitado->attendance = $validatedData['radio-group'];
        $invitado->guests = $validatedData['guest'];
        $invitado->save();

        return redirect()->back()->with('success', 'Asistencia enviada con éxito!');
    }
}
