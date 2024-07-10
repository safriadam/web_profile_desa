<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Homepage;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    function show(){
        $sambutan = Homepage::where('kategori', 'sambutan')->first();
        $struktur = Homepage::where('kategori', 'struktur')->first();
        // return $struktur;
        $nip = Homepage::where('kategori', 'nip')->first();
        $fotoCamat = Homepage::where('kategori', 'leader')->first();
        $fotoPengurus = Homepage::where('kategori', 'jajaran')->first();
        $tahun = Homepage::where('kategori', 'sejakTahun')->first();
        $camat = Homepage::where('kategori', 'namaCamat')->first();
        $desa = Homepage::where('kategori', 'jmlDesa')->first();
        $penduduk = Homepage::where('kategori', 'jmlPenduduk')->first();
        $visi = Homepage::where('kategori', 'visi')->first();
        $misi = Homepage::where('kategori', 'misi')->get();
        return view('Dashboard.Pages.Homepage.show', [
            'title' => 'Halaman Utama',
            'visi' => $visi->value ?? '',
            'nip' => $nip->value ?? '',
            'misi' => $misi ?? '',
            'struktur' => $struktur->value ?? '',
            'tahun' => $tahun->value ?? '',
            'desa' => $desa->value ?? '',
            'penduduk' => $penduduk->value ?? '',
            'camat' => $camat->value ?? '',
            'fotoCamat' => $fotoCamat->value ?? '',
            'fotoPengurus' => $fotoPengurus->value ?? '',
            'sambutan' => $sambutan->value,
        ]);
    
    }
    function updateNIP(Request $request){
        Homepage::where('kategori','nip')->update([
            'value' => $request->nipCamat ?? '-'
        ]);
        return redirect()->back();
    }
    function updateStruktur(Request $request){
        $file = $request->file('struktur');
        $namafile = time().'.'.$file->getClientOriginalExtension();
        // return $namafile;
        $request->struktur->move(public_path('assets/img'), $namafile);
        Homepage::where('kategori','struktur')->update([
            'value' => $namafile
        ]);
        return redirect()->back();
    }
    function updateSambutan(Request $request){
        Homepage::where('kategori','sambutan')->update([
            'value' => $request->sambutan
        ]);
        $date = Carbon::now();
        Homepage::where('kategori','tahunSambutan')->update([
            'value' => $date->translatedFormat('j F Y')
        ]);
        return redirect()->back();
    }
    function updateNamaCamat(Request $request){
        $nama =  $request->namaCamat;
        Homepage::where('kategori', 'namaCamat')->update([
            'value' => $nama
        ]);
        return redirect()->back();
    }
    function updateFotoCamat(Request $request){
        $file = $request->file('fotoCamat');
        $namafile = time().'.'.$file->getClientOriginalExtension();

        $request->fotoCamat->move(public_path('assets/homepage'), $namafile);
        Homepage::where('kategori', 'leader')->update([
            'value' => $namafile
        ]);

        return redirect()->back();
    }
    function updateFotoPengurus(Request $request){
        $file = $request->file('fotoPengurus');
        $namafile = time().'.'.$file->getClientOriginalExtension();

        $request->fotoPengurus->move(public_path('assets/homepage'), $namafile);
        Homepage::where('kategori', 'jajaran')->update([
            'value' => $namafile
        ]);

        return redirect()->back();
    }
    function updateData(Request $request){
        $update = [
            ['id' => 3, 'kategori' => 'sejakTahun', 'value' => $request->tahun],
            ['id' => 4, 'kategori' => 'jmlDesa', 'value' => $request->desa],
            ['id' => 5, 'kategori' => 'jmlPenduduk', 'value' => $request->penduduk]
        ];
        foreach ($update as $data) {
            Homepage::updateOrCreate(['id' => $data['id']], ['kategori' => $data['kategori'], 'value' => $data['value']]);
        }
        return redirect()->back();
    }
    function updateVisi(Request $request){
        $visi =  $request->addVisi;
        Homepage::updateOrCreate(['id' => 1], ['id' => 1, 'kategori' => 'visi', 'value' => $visi]);
        return redirect()->back();
    }
    function updateMisi(Request $request, $id){
        Homepage::where('id', $id)->update([
            'value' => $request->updateMisi
        ]);
        return redirect()->back();
    }
    function addMisi(Request $request){
        Homepage::create([
            'kategori' => 'misi',
            'value' => $request->addMisi
        ]);
        return back();
    }
    function deleteMisi($id){
        $misi = Homepage::where('id', $id)->first();
        $misi->delete();
        return back();
    }
    function deleteVisi(){
        Homepage::where('kategori', 'visi')->update([
            'value' => ''
        ]);
        return back();
    }
}
