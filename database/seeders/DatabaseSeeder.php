<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $faker = Faker::create();
        foreach(range(1,10) as $index)
        {
            DB::table('users')->insert([
                'nom' => $faker->firstname,
                'prenom' => $faker->lastname,
                'date_de_naissance' => $faker->date,
                'email' => $faker->unique()->safeEmail,
                'password'      =>  Hash::make('Golden@client#'),
                'adresse' => $faker->address,
                'created_at' => $faker->dateTimeBetween('-6 month', '+1 month')
            ]);
        }


        $this->call([
            AdminSeeder::class,
        ]);
    }
}
