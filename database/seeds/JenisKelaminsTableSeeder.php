<?php

use Illuminate\Database\Seeder;
use App\JenisKelamin;

class JenisKelaminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelamin::create([
            'name'  => 'laki-laki'
        ]);

        JenisKelamin::create([
            'name'  => 'perempuan'
        ]);
    }
}
