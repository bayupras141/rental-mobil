<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pelanggan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mobil = Mobil::where('status','tersedia')->get()->count();
        $customer = Pelanggan::all()->count();
        // $transaction  = $this->transaction;

        // $transaction_data = [];
        // for($i=1;$i<=12;$i++){
        //     $lul = $this->transaction->whereMonth('created_at',sprintf('%02s',$i))->whereYear('created_at',date('Y'))->get()->count();
        //     $transaction_data [] = $lul;
        // }
        // $label = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        // $chartjs = app()->chartjs
        //  ->name('trans')
        //  ->type('line')
        //  ->size(['width' => 400, 'height' => 200])
        //  ->labels($label)
        //  ->datasets([
        //     [
        //         "label" => "Transaksi",
        //         'backgroundColor' => "rgba(78, 115, 223, 0.05)",
        //         'borderColor' => "#e74a3b",
        //         "pointHoverRadius" => "3",
        //         "pointHitRadius"=> "10",
        //         "pointBorderWidth"=> "2",
        //         "pointBorderColor" => "#e74a3b",
        //         "pointBackgroundColor" => "#e74a3b",
        //         "pointHoverBackgroundColor" => "#e74a3b",
        //         "pointHoverBorderColor" => "#e74a3b",
        //         'data' => $transaction_data,
        //         // 'data' => [1,2,3,4,5,6,7,8,9,10,11,12]
        //     ]
        // ])
        //  ->optionsRaw("{
        //      'animation': {
        //          'duration': 2000
        //      }
        //  }");
        return view('home', compact('mobil', 'customer'));
    }
}
