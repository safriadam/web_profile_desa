<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $maps;
    public $alamat;
    public $hp;
    public $email;
    public function __construct()
    {
        $this->maps = Maps::where('kategori','maps')->first();
        $this->maps = $this->maps->link;
        $this->alamat = Maps::where('kategori','alamat')->first();
        $this->alamat = $this->alamat->link;
        $this->hp = Maps::where('kategori','phone')->first();
        $this->hp = $this->hp->link;
        $this->email = Maps::where('kategori','email')->first();
        $this->email = $this->email->link;
    }
}
