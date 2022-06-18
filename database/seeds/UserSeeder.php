<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => "Administrador",
            'apellido' => "Admin",
            'dni' => "00000000",
            'email' => "admin@test.com",
            'celular' => "+51987654321",
            'role' => "admin",
            'sucursal_id' => 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);
        
        factory(User::class, 10)->create();
        
    }
}
