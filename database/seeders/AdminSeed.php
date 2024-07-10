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
                'value' => 'pengurus.jpeg'
            ],
            [
                'kategori' => 'struktur',
                'value' => 'struktur.jpg'
            ],
            [
                'kategori' => 'leader',
                'value' => 'camat.JPG'
            ],
            [
                'kategori' => 'namaCamat',
                'value' => 'Suriawan, S.ST., M.T.'
            ],
            [
                'kategori' => 'tahunSambutan',
                'value' => '15 Juni 2024'
            ],
            [
                'kategori' => 'nip',
                'value' => '19761222199703 1 004'
            ],
            [
                'kategori' => 'deskripsi',
                'value' => 'kecamatan galing merupakan sebuah kecamatan di kabupaten sambas...'
            ],
            [
                'kategori' => 'sambutan',
                'value' => 'Puji dan syukur dipanjatkan kehadirat Allah Subhanahuwa Taala karena berkat limpahan rahmat-Nya jualah sehingga
            kita masih diberikan umur yang panjang lagi berkah
        Kecamatan Galing merupakan salah satu dari 19 kecamatan di Kabupaten Sambas yang merupakan penyangga (hynterland)
            daerah perbatan beik Paloh maupun Sajingan. Jumlah desa di Kecamatan Galing sebanyak 10 desa yakni, Desa Tri
            Kembang, Desa Ratu Sepudak, Desa Galing, Desa Sungai Palah, Desa Sijang, Desa Tri Gadu, Desa Tempapan Kuala,
            Desa Tempapan Hulu, Desa Teluk Pandan dan Desa Sagu. Di Kecamatan Galing terdapat 23 dusun dengan potensi yang
            ada terdiri dari pertanian, perkebunan dan perdagangan.
        Jumlah penduduk Kecamatan Galing berdasarkan Laporan dari Dinas Catatan Sipil Kabupaten Sambas Bulan Desember
            2023 berjumlah 26.002 orang dengan mayoritas beragama islam. Mata pencaharian penduduk sebagian besar merupakan
            petani dengan usaha perkebunan dan pertanian yang dominan berupa kelapa sawit, karet, padi. Sedangkan
            buah-buahan yang dominan berupa semangka
       Galing merupakan kota sejarah. Dimana dahulu kerajaan Sambas pernah terpusat di Kota Lama dengan Rajanya bernama
            Ratu Sepudak. Setelah masa pemerintahan Ratu Sepudak dilanjutkan oleh Ratu Kesuma Yuda, lokasi kerajaan
            berpindah ke Selakau. Selanjutnya setelah Ratu Kesuma Yuda dilanjutkan dengan Raden Sulaiman dengan gelar
            Sulthan Tsafiuddin, barulah ibukota berpidah di Teluk Madung dan setelahnya berpindah di Muara Ulakan atau di
            Kecamatan Sambas saat ini.
       Semoga Website Kecamatan Galing ini bisa memberikan manfaat bagi semua.'
            ],

        ]);
        Maps::insert([
            [
                'kategori' => 'maps',
                'link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1021048.5943287008!2d108.6695888758127!3d1.4890085303399543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e4c6f5a0740299%3A0x6c63ef7cfcd2b27c!2sKabupaten%20Sambas%2C%20Kalimantan%20Barat!5e0!3m2!1sid!2sid!4v1720453978905!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'kategori' => 'alamat',
                'link' => 'Kecamatan Galing'
            ],
            [
                'kategori' => 'phone',
                'link' => '081111111111'
            ],
            [
                'kategori' => 'email',
                'link' => 'kecamatan@galing.com'
            ],
        ]);
    }
}
