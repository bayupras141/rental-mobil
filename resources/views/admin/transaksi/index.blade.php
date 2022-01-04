@extends('layouts.layout')
@section('title', 'List Transaksi')
@section('content')
<p><i>Jika transaksi lebih dari 4 hari maka akan mendapat diskon 5%</i></p>
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="col-lg-2">
            <br>
            <button id="createNewData" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Tambah Data</span>
            </button>
        </div>
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
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- end card --}}
<div class="modal fade text-left" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeading" >Tambah Data @yield('title')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
              
                <form id="dataForm" name="dataForm" class="form-horizontal">

                    <!-- validator -->
                    <ul class="list-group" id="errors-validate"></ul>
                    <!-- end -->       

                    <input type="hidden" name="data_id" id="data_id">
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
                                <div class="col">
                                    <select name="pelanggan_id" id="pelanggan_id"  class="required form-control dt-post  @error('id_pelanggan') is-invalid @enderror ">
                                        <option  selected disabled >Pilih</option>
                                            @foreach($pelanggan as $row)
                                            <option value="{{$row->id}}"  >{{ $row->nama }}</option> 
                                            @endforeach
                                    </select>        
                                </div>
                            </div>
    
                            <div class="row" id="mobil_id">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Mobil</label>
                                        <select name="mobil_id" id="mobil_id"  class="required form-control dt-post  @error('id') is-invalid @enderror ">
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
                                        <select name="paket_id" id="paket_id" class="required form-control dt-post  @error('id') is-invalid @enderror ">
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
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                        <button type="submit"  id="saveBtn" class="btn btn-primary" >Save</button>
                    </div>
                </form>
             
            </div>
        </div>
    </div>
</div>
<!-- end modal --> 

@endsection
@push('scripts')
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        const rupiah = (number)=>{
          return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
          }).format(number);
        }
        // end format rupiah
        $(document).ready(function($){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('transaksi.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'invoice', name: 'invoice'},
                    {data: 'tgl_sewa', name: 'tgl_sewa'},
                    {data: 'tgl_kembali', name: 'tgl_kembali'},
                    {data: 'nama_pelanggan', name: 'nama_pelanggan'},
                    {data: 'nama', name: 'nama'},
                ]
            });

            // show modal
            $('#createNewData').click(function () { 
                $('#saveBtn').val("create-pelanggan");
                $('#data_id').val('');
                $('#dataForm').trigger("reset");
                $('#modalHeading').html("Tambah Data");
                $('#modalBox').modal('show');
                $("#errors-validate").hide();
                $('#saveBtn').prop('disabled', false);
            });
            // end

            // store process
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Simpan');
                $.ajax({
                    data: $('#dataForm').serialize(),
                    url: "{{route('transaksi.store')}}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if(data.status == 'sukses'){
                            $('#modalBox').modal('hide');
                            Swal.fire("Selamat", data.message , "success");
                            $('#dataForm').trigger("reset");
                            table.draw();
                        }else{
                            $('#message-error').html(data.message).show()
                        } 
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save');
                    }
                });
            });
            // end store process

            // end
            // delete
            $('body').on('click', '.deleteData', function () {
                var data_id = $(this).data("id");
                Swal.fire({
                    title: "Apa kamu yakin?",
                    text: "Menghapus data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!',
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                          'Terhapus!',
                          'Data berhasil dihapus.',
                          'success'
                        )
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('transaksi.store') }}"+'/'+data_id,
                            success: function (data) {
                                table.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                })
            });
            // end delete

        });
        
    </script>
@endpush