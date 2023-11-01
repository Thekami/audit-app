<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'admin',
            'email' => 'admin@midominio.com',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => 'usuario1',
            'email' => 'usuario1@midominio.com',
            'password' => Hash::make('usuario1'),
        ]);

    }
}
