<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function siswa() {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
}
