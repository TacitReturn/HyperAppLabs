<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\User;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Storage;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $user = User::where("email", "glenn@hyperapplab.com")->first();

            if (!$user) {
                User::create(
                    [
                        "name" => "Glenn Rudge",
                        "email" => "glenn@hyperapplabs.com",
                        "password" => Hash::make("1wre9PdJ1!ayFfxKOs@lwM"),
                        "role" => "admin",
                    ]
                );
            }

            DB::table("bio")->insert(
                [
                    "bio" => "I started off in tech at a young age, building websites for my E-sports and skateboarding 
                    team. Eventually, I begin learning more and more about web development, and here I am today."
                ]
            );
        }
    }
