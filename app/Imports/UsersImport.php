<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;


class UsersImport implements ToModel,WithHeadingRow,WithChunkReading,WithBatchInserts,ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        set_time_limit(900);

        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
        ]);


        // Verificar que las claves 'name', 'email' y 'password' estén presentes en la fila
        if (!isset($row['name']) || !isset($row['email']) || !isset($row['password'])) {
            throw ValidationException::withMessages([
                'error' => 'Por favor revisa que el archivo tenga la estructura de datos requerida'
            ]);
        }

    }

    public function batchSize(): int
    {
        return 6000;
    }

    public function chunkSize(): int
    {
        return 50;
    }




}
