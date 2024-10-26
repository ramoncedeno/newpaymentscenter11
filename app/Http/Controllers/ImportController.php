<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Validators\ValidationException;


    class ImportController extends Controller
{
    public function import(Request $request)
    {
        // Validar el archivo
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt' // Ajusta las extensiones permitidas según lo que necesites
        ]);


        try {

        // Procesar el archivo
        $file = $request->file('file');

        // Si estás usando Laravel Excel
        Excel::import(new UsersImport, $file);

        return back()->with('success', 'Archivo importado exitosamente.');

        } catch (ValidationException $e) {
            // Si ocurre una validación fallida, mostrar los mensajes de error
            return back()->withErrors($e->errors());

        } catch (\Exception $e) {
            // En caso de cualquier otro error
            return back()->withErrors(['error' => 'Hubo un problema al importar el archivo. Verifica su formato o contenido.']);
        }

    }


}

