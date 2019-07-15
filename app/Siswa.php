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
        return $this->belongsTo('App\JenisKelamin', 'id_jenis_kelamin');
    }

    public function agama() {
        return $this->belongsTo('App\Agama', 'id_agama');
    }

    public function transaksi() {
        return $this->hasMany('App\Transaksi');
    }
}
