<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Usuarios creados
        $users = factory(App\User::class,50)->create();
        
        $users->each(function(App\user $user) use ($users) {
            //Creando mensajes por cada usuario
            factory(App\Message::class)
            ->times(5)
            ->create([
                'user_id' => $user->id,
            ]);
            //Siguiendo usuarios por cada usuario
            $user->follows()->sync(
                $users->random(10)
            );
        });
    }
}
