<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Homepage;
use App\Models\Post;

class GuestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $banner = Homepage::where('kategori', 'banner')->first();
        $fotoCamat = Homepage::where('kategori', 'leader')->first();
        $fotoPengurus = Homepage::where('kategori', 'jajaran')->first();
        $tahun = Homepage::where('kategori', 'sejakTahun')->first();
        $camat = Homepage::where('kategori', 'namaCamat')->first();
        $desa = Homepage::where('kategori', 'jmlDesa')->first();
        $penduduk = Homepage::where('kategori', 'jmlPenduduk')->first();
        $slider = Gambar::all();
        $visi = Homepage::where('kategori', 'visi')->first();
        $misi = Homepage::where('kategori', 'misi')->get();
        return view('Guest.Index', [
            'title' => 'Beranda',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            'posts' => Post::query()->where('is_published', true)->latest()->limit(10)->get(),
            'visi' => $visi ?? '',
            'misi' => $misi ?? '',
            'banner' => $banner->value ?? '',
            'tahun' => $tahun->value ?? '',
            'desa' => $desa->value ?? '',
            'penduduk' => $penduduk->value ?? '',
            'camat' => $camat->value ?? '',
            'fotoCamat' => $fotoCamat->value ?? '',
            'fotoPengurus' => $fotoPengurus->value ?? '',
        ], compact('slider'));
    }
    public function about()
    {
        $header = Homepage::where('kategori','tema')->first();
        $deskripsi = Homepage::where('kategori', 'deskripsi')->first();
        $visi = Homepage::where('kategori', 'visi')->first();
        $misi = Homepage::where('kategori', 'misi')->get();
        return view('Guest.About', [
            'title' => 'Tentang Kami',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            'deskripsi' => $deskripsi,
            'visi' => $visi,
            'header' => $header->value,
            'misi' => $misi
        ]);
    }
    public function structure(){
        $header = Homepage::where('kategori','tema')->first();
        $struktur = Homepage::where('kategori','struktur')->first();
        return view('Guest.Structure', [
            'title' => 'Struktur Organisasi',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'header' => $header->value,
            'struktur' => $struktur->value,
            'hp' => $this->hp,
            'email' => $this->email,
        ]);
    }
    public function index1()
    {
        $header = Homepage::where('kategori','tema')->first();
        return view('Guest.Posts', [
            'title' => 'Semua Kegiatan',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            'header' => $header->value,
            "posts" => Post::query()->where('category_id', '=', 2)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index2()
    {
        $header = Homepage::where('kategori','tema')->first();
        return view('Guest.Posts', [
            'title' => 'Semua Pengumuman',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            'header' => $header->value,
            "posts" => Post::query()->where('category_id', '=', 3)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index3()
    {
        $header = Homepage::where('kategori','tema')->first();
        return view('Guest.Posts', [
            'title' => 'Semua Berita',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            'header' => $header->value,
            "posts" => Post::query()->where('category_id', '=', 1)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index4()
    {
        $header = Homepage::where('kategori','tema')->first();
        $sambutan = Homepage::where('kategori', 'sambutan')->first();
        $nip = Homepage::where('kategori','nip')->first();
        $tanggal = Homepage::where('kategori','tahunSambutan')->first();
        $fotoCamat = Homepage::where('kategori', 'leader')->first();
        $camat = Homepage::where('kategori', 'namaCamat')->first();
        return view('Guest.Sambutan', [
            'title' => 'Sambutan Camat',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            'nip' => $nip->value ?? '',
            'tanggal' => $tanggal->value ?? '',
            'sambutan' => $sambutan->value,
            'camat' => $camat->value ?? '',
            'header' => $header->value,
            'fotoCamat' => $fotoCamat->value ?? '',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $header = Homepage::where('kategori','tema')->first();
        return view('Guest.Post', [
            "title" => $post->title,
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
            "post" => $post,
            'header' => $header->value,
        ]);
    }
}
