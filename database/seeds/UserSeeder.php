<?php

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
        factory(\App\User::class)->create([
            'name' => 'Andrea Ortu',
            'email' => 'andrea.ortu.9229@gmail.com'
        ]);
    }
}
