<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'    => 'Admin',
            'last_name'     => 'User',
            'email'         => 'admin@email.com',
            'password'      => 'admin'
        ]);
    }
}
