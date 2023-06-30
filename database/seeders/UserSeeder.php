<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'glenn@hyperapplab.com')->first();

        DB::table('bio')->insert(
            [
                'bio' => 'I started off in tech at a young age, building websites for my E-sports and skateboarding
                    team. Eventually, I begin learning more and more about web development, and here I am today.',
            ]
        );
    }
}
