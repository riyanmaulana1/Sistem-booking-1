<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        
        IF(! $email || ! $password ){
            $this->command->error('ADMIN_EMAIL dan ADMIN_PASSWORD belum diisi di file .env');
            return;
        }
        DB::table('admin')->updateOrInsert(
            ['email'=> $email],
            [
                'nama'=> env('ADMIN_NAME', 'Admiun'),
                'password' => Hash::make($password),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->command->info('Akun Admin siap:'.$email);
    }
}
