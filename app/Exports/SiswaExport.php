<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromArray, withHeadings
{
    public function array(): array
    {
        $data = [];
        $i = 1;
        
        foreach (Siswa::all() as $siswa) {
            $data[] = [
                $i++,
                $siswa->nis,
                $siswa->nama,
                $siswa->alamat,
                $siswa->jenis_kelamin,
                $siswa->agama,
            ];
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            '#',
            'NIS',
            'Nama',
            'Alamat',
            'Jenis Kelamin',
            'Agama',
        ];
    }
}
