<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'asbi',
            'username' => 'asbi',
            'email' => 'asbi@test.com',
            'password' => Hash::make('asbi'),
            'is_admin' => true,
        ]);

        Category::create([
            'name' => 'Berita',
            'slug' => 'berita'
        ]);
        Category::create([
            'name' => 'Kegiatan',
            'slug' => 'kegiatan'
        ]);
        Category::create([
            'name' => 'Pengumuman',
            'slug' => 'pengumuman'
        ]);
    }
}
