<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    function create(Request $request){
        
    }
    function show(){
        $visi = Visi::where('kategori', 'visi')->first();
        $misi = Visi::where('kategori', 'misi')->get();
        return view('Dashboard.Pages.VisiMisi.show', [
            'title' => 'Visi dan Misi',
            'visi' => $visi->value ?? '',
            'misi' => $misi ?? '',
        ]);
    
    }
    function updateVisi(Request $request){
        $visi =  $request->addVisi;
        Visi::updateOrCreate(['id' => 1], ['id' => 1, 'kategori' => 'visi', 'value' => $visi]);
        return redirect()->back();
    }
    function updateMisi(Request $request, $id){
        Visi::where('id', $id)->update([
            'value' => $request->updateMisi
        ]);
        return redirect()->back();
    }
    function addMisi(Request $request){
        Visi::create([
            'kategori' => 'misi',
            'value' => $request->addMisi
        ]);
        return back();
    }
    function deleteMisi($id){
        $misi = Visi::where('id', $id)->first();
        $misi->delete();
        return back();
    }
    function deleteVisi(){
        Visi::where('kategori', 'visi')->update([
            'value' => ''
        ]);
        return back();
    }
}
