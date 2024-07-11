<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $gambar = Gambar::all();
        $banner = Homepage::where('kategori','banner')->first();
        $tema = Homepage::where('kategori','tema')->first();
        return view('Dashboard.Pages.Slider.Index', [
            'title' => 'Gambar Slider',
            'gambar' => $gambar,
            'banner' => $banner->value ?? '',
            'tema' => $tema->value ?? '',
        ]);
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
    public function updateBanner(Request $request){
        $file = $request->file('banner');
        $namafile = time().'.'.$file->getClientOriginalExtension();

        $request->banner->move(public_path('assets/img'), $namafile);
        Homepage::where('kategori','banner')->update([
            'value' => $namafile
        ]);
        return redirect()->back();
    }
    public function updateTema(Request $request){
        $file = $request->file('tema');
        $namafile = time().'.'.$file->getClientOriginalExtension();

        $request->tema->move(public_path('assets/img'), $namafile);
        Homepage::where('kategori','tema')->update([
            'value' => $namafile
        ]);
        return redirect()->back();
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
