<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function siswa() {
        return $this->hasMany('App\Siswa');
    }
}
