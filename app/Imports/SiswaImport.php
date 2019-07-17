<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Contracts\Queue\ShouldQueue;

class SiswaImport implements ToModel, withHeadingRow, withChunkReading, withValidation, shouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'nis'           => $row['nis'],
            'nama'          => $row['nama'],
            'alamat'        => $row['alamat'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'agama'         => $row['agama'],
        ];

        return Siswa::updateOrCreate(
            ['nis' => $row['nis']],
            [
                'nama'          => $row['nama'],
                'alamat'        => $row['alamat'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'agama'         => $row['agama'],
            ],
        );
    }

    public function rules(): array
    {
        return [
            'nis'           => 'required',
            'nama'          => 'required',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nis'            => 'Your column nis not valid',
            'nama'           => 'Your column name not valid',
            'alamat'         => 'Your column alamat not valid',
            'jenis_kelamin'  => 'Your column jenis kelamin not valid',
            'agama'          => 'Your column agama not valid',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
