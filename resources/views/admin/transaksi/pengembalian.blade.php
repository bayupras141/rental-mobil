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
                        <th>Pelanggan</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Mobil</th>
                        <th>Status Mobil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->invoice }}</td>
                        <td>{{ $data->pelanggan->nama }}</td>
                        <td>{{ $data->tgl_sewa }}</td>
                        <td>{{ $data->tgl_kembali }}</td>
                        <td>{{ $data->mobil->nama }}</td>
                        @if($data->mobil->status == 'Sedang Disewa')
                        <td><span class="badge badge-danger">{{ $data->mobil->status }}</span></td>
                        @elseif($data->mobil->status == 'Tersedia')
                        <td><span class="badge badge-success">{{ $data->mobil->status }}</span></td>
                        @endif
                        <td>
                            {{-- if status mobil == sedang disewa --}}
                            @if($data->mobil->status == 'Sedang Disewa')
                            <a href="{{ route('transaksi.kembali', $data->id) }}" class="btn btn-primary btn-sm" OnClick="return confirm('Apakah anda yakin mobil sudah kembali?')">Pengembalian</a>
                            </form>
                            @else
                            N\A 
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