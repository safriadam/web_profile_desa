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
            'posts' => Post::query()->where('is_published', true)->latest()->limit(10)->get(),
            'visi' => $visi ?? '',
            'misi' => $misi ?? '',
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
        $visi = Homepage::where('kategori', 'visi')->first();
        $misi = Homepage::where('kategori', 'misi')->get();
        return view('Guest.About', [
            'title' => 'Tentang Kami',
            'maps' => $this->maps,
            'visi' => $visi,
            'misi' => $misi
        ]);
    }
    public function structure(){
        return view('Guest.Structure', [
            'title' => 'Struktur Organisasi',
            'maps' => $this->maps,
        ]);
    }
    public function index1()
    {
        return view('Guest.Posts', [
            'title' => 'Semua Kegiatan',
            'maps' => $this->maps,
            "posts" => Post::query()->where('category_id', '=', 2)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index2()
    {

        return view('Guest.Posts', [
            'title' => 'Semua Pengumuman',
            'maps' => $this->maps,
            "posts" => Post::query()->where('category_id', '=', 3)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index3()
    {
        return view('Guest.Posts', [
            'title' => 'Semua Berita',
            'maps' => $this->maps,
            "posts" => Post::query()->where('category_id', '=', 1)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index4()
    {
        return view('Guest.Sambutan', [
            'title' => 'Sambutan Camat',
            'maps' => $this->maps,
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
        return view('Guest.Post', [
            "title" => $post->title,
            'maps' => $this->maps,
            "post" => $post
        ]);
    }
}
