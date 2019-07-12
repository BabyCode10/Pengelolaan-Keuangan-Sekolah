<?php

use Illuminate\Database\Seeder;
use App\Agama;

class AgamasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::create([
            'name'  => 'Islam'
        ]);

        Agama::create([
            'name'  => 'Hindu'
        ]);

        Agama::create([
            'name'  => 'Budha'
        ]);

        Agama::create([
            'name'  => 'Kristen'
        ]);
    }
}
