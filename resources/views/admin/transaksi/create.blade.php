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
                <div class="form-group">
                    <label class="col control-label">Invoice</label>
                    <div class="col">
                        <input type="text" id="invoice" class="form-control dt-post required" name="invoice" readonly="" value="{{$invoice}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-lg-12">Pelanggan</label>
                            <div class="col-lg-10">
                                <select name="id_pelanggan" id="id_pelanggan"  class="required form-control dt-post  @error('id_pelanggan') is-invalid @enderror ">
                                    <option  selected disabled >Pilih</option>
                                        @foreach($pelanggan as $row)
                                    <option value="{{$row->id}}"  >{{ $row->nama }}</option> 
                                @endforeach
                                </select>        
                            </div>
                        </div>
                        <div class="row" id="product">
                            <div class="col">
                                <div class="form-group">
                                    <label>Mobil</label>
                                    <select name="id" id="id"  class="required form-control dt-post  @error('id') is-invalid @enderror ">
                                        <option  selected disabled >Pilih</option>
                                        @foreach($mobil as $row)
                                        <option value="{{$row->id}}"  >{{ $row->nama }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="product">
                            <div class="col">
                                <div class="form-group">
                                    <label>Paket</label>
                                    <select name="id" id="id"  class="required form-control dt-post  @error('id') is-invalid @enderror ">
                                        <option  selected disabled >Pilih</option>
                                        @foreach($paket as $row)
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
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection