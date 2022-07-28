<?php

    namespace Database\Seeders;

    use App\Models\Category;
    use App\Models\Tag;
    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            $this->call(
                [
                    CategorySeeder::class,
                    UserSeeder::class,
                    PostSeeder::class,
                    TagSeeder::class,
                ]
            );
        }
    }
