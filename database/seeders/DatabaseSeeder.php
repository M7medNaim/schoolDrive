<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // $defaultImageName = 'fakeImage.png';
        // $defaultImagePath = 'public/users/' . $defaultImageName;
        // if (!Storage::exists($defaultImagePath)) {
        //     Storage::copy('path_to_default_image/fakeImage.png', $defaultImagePath);
        // }

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@app.com',
            'password' => '123123',
        ]);
    }
}
