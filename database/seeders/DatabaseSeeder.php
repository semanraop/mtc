<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\location;
use App\Models\Mtcmodel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => '玉藻の前',
            'email' => 'admin@admin.com',
            'username' => 'mamocchi',
            'usertype' => 'admin',
            'password' => Hash::make('123123123'), // Hash the password
        ]);
        
        // Create location level 1
        location::factory(1309)->create();


        // Create the default mtc models
        $types = [
            'HP Pro mt440 G3 Mobile Thin Client',
            'HP mt46 Mobile Thin Client', // Add your new model type here
        ];

        foreach ($types as $type) {
            Mtcmodel::firstOrCreate(['name' => $type]);
        }
        
    }
}
