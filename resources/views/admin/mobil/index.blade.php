@extends('layouts.layout')
@section('title', 'Mobil')
@section('content')
{{-- card --}}
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="col-lg-2">
            <br>
            <button id="createNewData" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" >
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
                        <th>Nama</th>
                        <th>Nopol</th>
                        <th>Warnra</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- end card --}}


<!-- Modal -->
<div class="modal fade text-left" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeading">Tambah Data @yield('title')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm" name="dataForm" class="dataForm form-horizontal" enctype="multipart/form-data">
                    <!-- validator -->
                    <ul class="list-group" id="errors-validate">
                    </ul>
                    <!-- end -->
                
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="form-group">
                        <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                        <input type="text" class="form-control dt-full-name required" id="nama" name="nama" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-icon-default-post">Nomor Plat</label>
                        <input type="text" id="nopol" class="form-control dt-post required" name="nopol">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-icon-default-post">Warna</label>
                        <input type="text" id="warna" class="form-control dt-post required" name="warna">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-icon-default-post">Status</label>
                        <select name="status" id="status" class="form-control dt-post required">
                            <option  selected disabled >Pilih</option>
                            <option value="tersedia" id="tersedia">Tersedia</option>
                            <option value="sedang disewa" id="disewa">Sedang Disewa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="picture">Foto</label>
                        <br>
                        <input name="foto" id="foto" type="file" class="form-control dt-post required" accept="image/*" >
                    </div>
                    {{-- preview image --}}
                    <div class="form-group">
                        <label for="foto">Preview</label>
                        <br>
                        <img id="preview" src="" alt="" width="200" height="200">
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
        // start
        
        $(document).ready(function($){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // show foto on table
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('mobil.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama', name: 'nama'},
                    {data: 'nopol', name: 'nopol'},
                    {data: 'warna', name: 'warna'},
                    {data: 'status', name: 'status'},
                    {data: 'foto', name: 'foto',
                        render: function(data, type, row){
                            return '<img src="{{ asset('storage/') }}/'+data+'" width="50" height="50">';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            // show modal
            $('#createNewData').click(function () { 
                $('#saveBtn').val("create-Mobil");
                $('#data_id').val('');
                $('#dataForm').trigger("reset");
                $('#modalHeading').html("Tambah Data");
                $('#modalBox').modal('show');
                $("#errors-validate").hide();
                $('#saveBtn').prop('disabled', false);
            });

            $('#foto').change(function(){    
               let reader = new FileReader();
               reader.onload = (e) => { 
                 $('#preview').attr('src', e.target.result); 
               }
               reader.readAsDataURL(this.files[0]); 
            });

            // store process
            $('#dataForm').submit(function(e) {
                e.preventDefault();  
                var formData = new FormData(this);
            
                $.ajax({
                    type:'POST',
                    url: "{{route('mobil.store')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
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

            // $('#saveBtn').click(function (e) {
            //     e.preventDefault();
            //     $('#saveBtn').html("Simpan");  
            //     $(this).html('Sending..');

            //     var formData = new FormData('#dataForm');
            //     $.ajax({
                    
            //       data: new FormData('#dataForm'),
            //       url: "{{route('mobil.store')}}",
            //       type: "POST",
            //       dataType: 'json',
            //       success: function (data) {
            //           if(data.status == 'sukses'){
            //                 $('#modalBox').modal('hide');
            //                 Swal.fire("Selamat", data.message , "success");
            //                 $('#dataForm').trigger("reset");
            //                 table.draw();
            //             }else{
            //                 $('#message-error').html(data.message).show()
            //             }
            //       },
            //       error: function (data) {
            //           console.log('Error:', data);
            //           $('#saveBtn').html('Save');
            //       }
            //   });
            // });
            // end store process
            // edit data
            $('body').on('click', '.editData', function () {
                var data_id = $(this).data('id');
                $.get($(location).attr('href') +'/' + data_id +'/edit', function (data) {
                    $('#saveBtn').html("Update");  
                    $('#modalHeading').html("Edit Data");
                    $('#modalBox').modal('show');
                    $("#errors-validate").hide();
                    $('#saveBtn').prop('disabled', false);
                    // get data respone
                    $('#data_id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#nopol').val(data.nopol);
                    $('#warna').val(data.warna);
                    $('#status').val(data.status);
                    $('#foto').val(data.foto);
                })
            });
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
                            url: "{{ route('mobil.store') }}"+'/'+data_id,
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