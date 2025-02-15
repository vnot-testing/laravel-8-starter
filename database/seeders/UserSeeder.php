<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php faker
        $faker = \Faker\Factory::create('id_ID');

        // truncate db
        DB::table('user')->truncate();

        // Create user manual with DB Facades
        DB::table('user')->insert([
            [
                'uuid' => $faker->uuid,
                'fullname' => 'admin',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'email_verified_at' => now(),
                'phone' => $faker->e164PhoneNumber,
                'password' => app('hash')->make('admin'),
            ],
        ]);

        // // Create user manual with DB Facades
        // DB::table('auth_two_factor')->insert([
        //     [
        //         'uuid' => $faker->uuid,
        //         'name' => 'email',
        //     ],
        // ]);

        // Create user manual with model eloquent
        $user = new User();
        $user->uuid = $faker->uuid;
        $user->fullname = 'user';
        $user->username = 'user';
        $user->email = 'user@email.com';
        $user->email_verified_at = now();
        $user->phone = $faker->e164PhoneNumber;
        $user->password = app('hash')->make('user');
        $user->save();

        // Create user random
        User::factory(5)->create();
    }
}
