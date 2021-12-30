@extends('layouts.layout')
@section('title','Dashboard')
@section('content')
<div class="col-xl-3 col-md-6 mb-4">
    <a href="{{route('print.mobil')}}" style="text-decoration:none;">
    <div class="card border-left-danger shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Mobil Tersedia</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mobil}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-car fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <a href="{{route('print.pelanggan')}}" style="text-decoration:none;">
    <div class="card border-left-danger shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Customer</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customer}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <a href="{{route('print.transaksi')}}" style="text-decoration:none;">
    <div class="card border-left-danger shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaksi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transaksi}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-danger shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaksi Belum Bayar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transaksi_aktif}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-danger shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                    {{-- format rupiah --}}
                    Rp. {{number_format($pendapatan,0,',','.')}}
                        {{-- {{$pendapatan}} --}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" type="text/javascript"></script>
@endpush