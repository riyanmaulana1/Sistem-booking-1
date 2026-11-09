<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Autenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'jenis_instansi',
    'nama_instansi',
    'fakultas_id',
    'prodi_id',
    'email',
    'password',
    'no_telpon',
    'status_akun',
    'wajib_ganti_password',
])]
#[Hidden(['password','remember_token'])]

class Instansi extends Autenticatable
{
    use Notifiable;
    protected $table = 'instansi';
    protected function casts():array
    {
        return[
            'password'=>'hashed',
            'wajib_ganti_password'=>'boolean',
        ];
    }
}
