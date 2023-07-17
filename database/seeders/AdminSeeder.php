<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'nombre' => 'Nombre del Admin',
            'apellido' => 'Apellido del Admin',
            'cedula_identidad' => '123456789',
            'telefono' => '1234567890',
            'direccion' => 'Dirección del Admin',
            'email' => 'test@test.com',
            'password' => Hash::make('test12345'),
            'fecha_nacimiento' => '1990-01-01',
        ]);
    }
}
