<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function siswa() {
        return $this->belongsTo('App\Siswa')
    }
}
