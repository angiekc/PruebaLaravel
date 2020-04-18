<?php

use Illuminate\Database\Seeder;

//Class Faker. Componente generador de datos aleatorios.
use Faker\Factory as Faker;
// Class User para crear nuevos usuarios.
use App\User;
// Uso de la Facade Hash para generar passwords encriptados.
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        $faker = Faker::create();
        for ($i=0; $i < 30; $i++) { 
        	$user = new User;
        	$user->name = $faker->name;
        	$user->email = $faker->email;
        	$user->password = Hash::make('test123');
            $user->role = $faker->randomElement($array = array ('Admin','User'));
        	$user->state_id = 1;
        	$user->save();
        }
    }
}
