<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        return view('Dashboard.Pages.Maps.index', [
            'title' => 'Maps',
            'maps' => $this->maps,
            'alamat' => $this->alamat,
            'hp' => $this->hp,
            'email' => $this->email,
        ]);
    }
    public function updateAlamat(Request $request){
        Maps::where('kategori','alamat')->update([
            'link' => $request->alamat
        ]);
        return redirect()->back();
    }
    public function updateTelp(Request $request){
        Maps::where('kategori','phone')->update([
            'link' => $request->telp
        ]);
        return redirect()->back();
    }
    public function updateEmail(Request $request){
        Maps::where('kategori','email')->update([
            'link' => $request->email
        ]);
        return redirect()->back();
    }
    public function updateMap(Request $request){
        Maps::where('kategori','maps')->update([
            'link' => $request->map
        ]);
        return redirect()->back();
    }
}
