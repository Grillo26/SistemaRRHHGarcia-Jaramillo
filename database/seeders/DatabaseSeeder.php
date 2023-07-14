<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Turno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->name = 'Carlos Enrique';
        $user->lastname = 'Mamani Torrez';
        $user->username = 'Grillo26';
        $user->email = 'carlsenrmt26@gmail.com';
        $user->email_verified_at = now();
        $user->password =  bcrypt('kuynva26101997');
        $user->remember_token = Str::random(10);
        $user->save();

        $turno = new Turno();
        $turno->nombreTurno = 'Mañana';
        $turno->descripcion = 'Horario de 8 de la mañana a 2 de la tarde';
        $turno->save();
        $turno2 = new Turno();
        $turno2->nombreTurno = 'Tarde';
        $turno2->descripcion = 'Horario de la tarde a 8 de la noche';
        $turno2->save();




    }
}
