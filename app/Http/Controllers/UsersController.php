<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\UsersImport;
use App\Http\Controllers\Controller;

use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;


class UsersController extends Controller
{
    // public function export()
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }


    public function import()
    {
        Excel::import(new UsersImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }


        public function showImportView()
    {
        // Obtener los usuarios ordenados por la fecha de creación del más reciente al más antiguo
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        // Pasar los usuarios a la vista
        return view('Importview', compact('users'));



    }


    public function export()
    {
        $users = User::all();

        $response = new StreamedResponse(function () use ($users) {
            $handle = fopen('php://output', 'w');

            // Cabeceras del archivo CSV (primera fila)
            fputcsv($handle, ['id', 'name', 'email', 'created_at']);

            // Agregar cada usuario al CSV
            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->created_at->setTimezone('America/Mexico_City')->format('Y/m/d H:i:s')
                ]);
            }
            fclose($handle);
        });

        // Cabeceras de la respuesta
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="usuarios.csv"');

        return $response;
    }



}
