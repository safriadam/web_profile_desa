<?php

namespace Database\Seeders;

use App\Models\Homepage;
use App\Models\Maps;
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
        Maps::insert([
            'link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1021048.5943287008!2d108.6695888758127!3d1.4890085303399543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e4c6f5a0740299%3A0x6c63ef7cfcd2b27c!2sKabupaten%20Sambas%2C%20Kalimantan%20Barat!5e0!3m2!1sid!2sid!4v1720453978905!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ],);
    }
}
