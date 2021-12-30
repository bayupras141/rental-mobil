@extends('layouts.app')
@section('style')
<style>
    html {
        scroll-behavior: smooth;
    }
    .garis {
        max-width: 60%;
        border: 1px solid #535351;
    }
    
</style>
@endsection
{{-- content --}}
@section('content')
<div class="row px-4">
    <div class="col-lg-8">
        <img src="{{asset('storage/'.$mobil->foto)}}" alt="" style="max-width: 100%;">
        <div class="row text-center my-5" style="max-width: 80%;">
            <div class="col-lg-12">
                <h1>{{ $mobil->nama }}</h1>  
                <hr class="garis">
            </div>
            <p>Warna : {{ $mobil->warna }}</p>
            <p>Status : {{ $mobil->status }}</p>
            {{-- if mobil status == 'Sedang Disewa' --}}
            @if ($mobil->status == 'Sedang Disewa')
            <p>Tanggal Kembali :  {{ $dt->tgl_kembali }}</p>
            @else
            <p></p>
            @endif
          </div>

         <a class="btn btn-sm btn-outline-secondary" style="    background-color: greenyellow;
    border-radius: 10px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
" href="https://wa.me/+628885082933?text=Saya%20Mau%20Booking%20Mobil%20Min%2C%2C%0ANama%20%3A%0ANama%20Mobil%20%3A%0ATanggal%20Sewa%20%3A%20%0ATanggal%20Kembali%20%3A"> 
         B O O K I N G</a>

         <div class="row">
            <div class="col-md-12">
            </div>
        </div>

    </div>
</div>
<hr>
@endsection