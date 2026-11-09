<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Autenticatable;
use Illuminate\Notifications\Notifiable;
use Override;

#[Fillable([
    'jenis_peminjam',
    'nama',
    'nim',
    'nip',
    'nama_organisasi',
    'fakultas_id',
    'prodi_id',
    'email',
    'no_hp',
    'password',
])]
#[Hidden(['password','remember_token'])]

class Pengguna extends Autenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'pengguna';
    protected function casts():array
    {
        return[
            'email_verified_at'=>'datetimne',
            'password' => 'hashed'
        ];
    }
}
