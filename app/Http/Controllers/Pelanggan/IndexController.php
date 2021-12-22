<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Paket;
use DataTables;
class IndexController extends Controller
{
    // create a function index 
    public function index()
    {
        $data = Mobil::all();
        return view('user.index', compact('data'));
    }
}
