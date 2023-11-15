<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        User::factory()->count(2)
            ->state(new Sequence(
                ['email' => 'user@yopmail.com'],
                ['email' => 'admin@yopmail.com']
            ))
            ->create();
    }
}
