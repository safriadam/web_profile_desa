<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    function create(Request $request){
        
    }
    function show(){
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
            'misi' => $misi ?? '',
            'tahun' => $tahun->value ?? '',
            'desa' => $desa->value ?? '',
            'penduduk' => $penduduk->value ?? '',
            'camat' => $camat->value ?? '',
            'fotoCamat' => $fotoCamat->value ?? '',
            'fotoPengurus' => $fotoPengurus->value ?? '',
        ]);
    
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
