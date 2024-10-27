<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }


    public function store(Request $request)
    {
        // Validar que el archivo esté presente
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048'
        ]);

        // Almacenar el archivo en el disco 'public'
        $route = $request->file('file')->store('uploads', 'public');

        // Guardar la información en la base de datos
        $file = new file();
        $file->name = $request->file('file')->getClientOriginalName();
        $file->route = $route;
        $file->save();

        return redirect()->route('files.index')->with('success', 'File uploaded successfully¡');
    }
}
