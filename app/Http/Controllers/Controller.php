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
    public function __construct()
    {
        $this->maps = $this->maps = Maps::all()->first();
        $this->maps = $this->maps->link;
    }
}
