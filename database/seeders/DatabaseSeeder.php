<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar a los seeders creados
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class); //llamamos
        $this->call(BloodTypeSeeder::class);



        //Crear usuario de prueba cada vez que se ejecuten las migraciones

    }
}
