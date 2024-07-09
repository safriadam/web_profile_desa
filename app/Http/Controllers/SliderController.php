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
    public function delete($id){
        $gambar = Gambar::where('id', $id)->first();
        $gambar->delete();
        return redirect()->back();
    }
    public function update($id){
        $gambar = Gambar::where('id', $id)->first();

        return view('Dashboard.Pages.Slider.Create', [
            'title' => 'Tambah Gambar Slider',
            'gambar' => $gambar,
        ]);
    }
    public function upload(Request $request){
        
        $file = $request->file('image');
        $namafile = time().'.'.$file->getClientOriginalExtension();

        $request->image->move(public_path('assets/slider'), $namafile);
        
        $gambar = new Gambar();
        $gambar->nama_gambar = $namafile;
        $gambar->keterangan = $request->keterangan;
        
        $gambar->save();

        return redirect('dashboard/slider')
            ->with('success','Gambar berhasil diunggah.')
            ->with('image',$namafile);

    }
}
