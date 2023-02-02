<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create Admin User
         $user = User::create([
            'nom'    => 'Diagui',
            'prenom'     => 'Tounkara',
            'email'         =>  'golden.market@gmail.com',
            'password'      =>  Hash::make('Golden@market123#'),
            'role_as'       => 1,
            'adresse'       => 'Faladie',
            'telephone'       => 76292270
        ]);
    }
}
