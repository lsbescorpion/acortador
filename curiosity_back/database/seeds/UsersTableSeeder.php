<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'nombre_apellidos' => 'Liusvani Suarez Barzaga',
            'perfil_fb' => 'https://www.facebook.com/lsbescorpion',
            'password' => bcrypt('lsbarzaga'),
            'correo' => 'liusvani@gmail.com',
            'activo' => true
        ]);
    }
}
