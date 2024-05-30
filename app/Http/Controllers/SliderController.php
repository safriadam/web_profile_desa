<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $gambar = Gambar::all();
        return view('Dashboard.Pages.Slider.Index', [
            'title' => 'Gambar Slider',
        ], compact('gambar'));
    }
    public function create(){
        return view('Dashboard.Pages.Slider.Create', [
            'title' => 'Tambah Gambar Slider',
        ]);
    }
    public function upload(Request $request){
        // $request->validate([
        //     'image' => 'required|mimes:jpg'
        // ]);
        
        $file = $request->file('image');
        $namafile = time().'.'.$file->getClientOriginalExtension();

        $request->image->move(public_path('assets/slider'), $namafile);
        
        $gambar = new Gambar();
        $gambar->nama_gambar = $namafile;
        $gambar->save();

        return redirect()->back()
            ->with('success','Gambar berhasil diunggah.')
            ->with('image',$namafile);

    }
}
