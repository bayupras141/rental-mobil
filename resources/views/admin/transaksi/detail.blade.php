@extends('layouts.layout')
@section('title', 'List Transaksi')
@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="data-table table table-sm table-bordered table-striped" id="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Invoice</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Status</th>
                        <th>Paket</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->invoice }}</td>
                        <td>{{ $data->tgl_sewa }}</td>
                        <td>{{ $data->tgl_kembali }}</td>
                        <td>{{ $data->pelanggan->nama }}</td>
                        <td>{{ $data->mobil->nama }}</td>
                        {{-- if status == belum bayar --}}
                        @if($data->status == 'Belum Bayar')
                        <td><span class="badge badge-warning">{{ $data->status }}</span></td>
                        @elseif($data->status == 'Lunas')
                        <td><span class="badge badge-success">{{ $data->status }}</span></td>
                        @endif
                        <td>{{ $data->paket->nama }}</td>
                        <td>Rp. {{ number_format($data->total_bayar, 0, ',', '.') }}</td>
                        <td>
                            @if($data->status == 'Lunas')
                            <a href="{{ route('transaksi.print', $data->id) }}" class="btn btn-info btn-sm" OnClick="return confirm('Cetak nota')" target="_blank"><i class="fa fa-print"></i></a>
                
                            @else
                            <a href="{{ route('transaksi.bayar', $data->id) }}" class="btn btn-warning btn-sm" OnClick="return confirm('Apakah anda yakin user sudah membayar?')">Bayar</a>
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
// status sweetalert2 success bayar
$(document).ready(function() {
    const flashData = $('.flash-data').data('flashdata');
    if (flashData == 'success') {
        swal({
            title: "Success!",
            text: "Transaksi berhasil dibayar!",
            icon: "success",
            button: "OK",
        });
    }
});
</script>
@endpush