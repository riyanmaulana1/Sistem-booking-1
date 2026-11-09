<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Autenticatable;

#[Fillable([ 'nama' , 'email' , 'password' ])]
#[Hidden(['password','remember_token'])]


class Admin extends Autenticatable
{
    protected $table = 'admin';
    protected function cast(): array{
        return[
            'password' => 'hashed',
        ];
    }
}
