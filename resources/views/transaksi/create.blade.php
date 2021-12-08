@extends('layouts.layout')
@section('title', 'Transaksi')
@section('content')
<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-lg-12">Pelanggan</label>
                            <div class="col-lg-10">
                            <select name="id_pelanggan" id="id_pelanggan"  class="required form-control dt-post  @error('id_pelanggan') is-invalid @enderror ">
                            <option  selected disabled >Pilih</option>
                            @foreach($id_pelanggan as $row)
                            <option value="{{$row->id}}"  >{{ $row->nama }}</option> 
                            @endforeach
                        </select>        
                        </div>
                            <div class="col-lg-2">
                            <div class="form-check form-check-inline">
                                <select name="customer" class="custom-select">
                                    <option value="old" selected>Lama</option>
                                    <option value="new">Baru</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="new_customer"></div>
                    </div>
                </div>
                <div class="row" id="product">
                    <div class="col">
                        <div class="form-group">
                            <label>Mobil</label>
                            <select name="id" id="id"  class="required form-control dt-post  @error('id') is-invalid @enderror ">
                            <option  selected disabled >Pilih</option>
                            @foreach($id as $row)
                            <option value="{{$row->id}}"  >{{ $row->nama }}</option> 
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Tanggal Sewa</label>
                          <input type="date" name="tgl_sewa" class="form-control datepicker" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <label>Tanggal Kembali</label>
                          <input type="date" name="tgl_kembali" class="form-control datepicker" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('transaksi.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script>

</script>
@endpush