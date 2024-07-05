<?php

namespace Database\Seeders;

use App\Models\Visi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visi::insert([
            [
                'kategori' => 'visi',
                'value' => 'Ini adalah visi kecamatan galing'
            ],
            [
                'kategori' => 'misi',
                'value' => 'Ini adalah misi kecamatan galing'
            ],
        ]);
    }
}
