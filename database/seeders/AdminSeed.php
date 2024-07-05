<?php

namespace Database\Seeders;

use App\Models\Homepage;
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
        Homepage::insert([
            [
                'kategori' => 'visi',
                'value' => 'Visi'
            ],
            [
                'kategori' => 'misi',
                'value' => 'Misi'
            ],
            [
                'kategori' => 'sejakTahun',
                'value' => '2024'
            ],
            [
                'kategori' => 'jmlDesa',
                'value' => '10'
            ],
            [
                'kategori' => 'jmlPenduduk',
                'value' => '10000'
            ],
            [
                'kategori' => 'jajaran',
                'value' => 'jajaran.jpg'
            ],
            [
                'kategori' => 'leader',
                'value' => 'kepala.jpg'
            ],
            [
                'kategori' => 'namaCamat',
                'value' => 'Suriawan, S.ST., M.T.'
            ],
        ]);
    }
}
