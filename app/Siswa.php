<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function jenis_kelamin() {
        return $this->hasMany('App\JenisKelamin');
    }

    public function agama() {
        return $this->hasMany('App\Agama');
    }
}
