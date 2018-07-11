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
        factory(App\User::class,50)->create()->each(function(App\user $user){
            factory(App\Message::class)
            ->times(5)
            ->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
