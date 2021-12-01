@extends('layouts.layout')
@section('title','Dashboard')
@section('content')

 <div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pelanggan </h6>
    </div>
        <div class="card-body">
        <table class="data-table table" id="data-table">
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add </button>
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Nik</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No hp</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="linkEditorModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="modalHeading " style="color: black;" >Tambah Pelanggan</h4>
    </div>
    <div class="modal-body">    
<form id="modalFormData" name="modalFormData" class="form-horizontal">
            <div class="form-group">
                 <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control dt-full-name required" id="nama" name="nama" required="">
                         </div>
                       </div>
                 <div class="form-group">
                    <label class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-12">
                        <input type="text" id="username" class="form-control dt-post required" name="username">
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-4 control-label">Nik</label>
                        <div class="col-sm-12">
                        <input type="text" id="nik" class="form-control dt-post required" name="nik">
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-12">
                        <input type="text" id="email" class="form-control dt-post required" name="email">
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-12">
                        <input type="text" id="alamat" class="form-control dt-post required" name="alamat">
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-4 control-label">No Handphone</label>
                        <div class="col-sm-12">
                        <input type="text" id="no_hp" class="form-control dt-post required" name="no_hp">
                      </div>
                    </div>
    <div class="col-12">
        <div class="form-group row" style="    padding-left: 13px;"> 
                <label for="contact-info">Jenis kelamin</label>
            <div class="custom-control custom-radio ml-1 ">
                <input type="radio" id="validationRadiojq1" name="jenis_kelamin" value="Laki-Laki" class="custom-control-input">
                <label class="custom-control-label" for="validationRadiojq1">Laki-Laki</label>
            </div>
            <div class="custom-control custom-radio  ml-1">
                <input type="radio" id="validationRadiojq2" name="jenis_kelamin" value="Perempuan"  class="custom-control-input">
                <label class="custom-control-label" for="validationRadiojq2">Perempuan</label>
            </div>

        </div>
    </div>
   
  <!-- end form  -->
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
</div>
<!-- end modal --> 

</section>


@endsection
@push('scripts')
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

<script>
     $(document).ready(function($){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pelanggan.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama', name: 'nama'},
                {data: 'username', name: 'username'},
                {data: 'nik', name: 'nik'},
                {data: 'email', name: 'email'},
                {data: 'alamat', name: 'alamat'},
                {data: 'no_hp', name: 'no_hp'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

    // button create new data
    $('#btn-add').click(function () {
        $('#saveBtn').html("Save");
        $('#data_id').val('');
        $('#modalFormData').trigger("reset");
        $('#modalHeading').html("Tambah Data");
        $('#linkEditorModal').modal('show');
        $("#errors-validate").hide();
        $('#saveBtn').prop('disabled', false);
    });
    // end 
      // store process
      $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                  data: $('#modalFormData').serialize(),
                  url: "{{route('pelanggan.store')}}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      if(data.status == 'sukses'){
                            $('#modalBox').modal('hide');
                            Swal.fire("Selamat", data.message , "success");
                            $('#modalFormData').trigger("reset");
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
//get data
});

</script>
@endpush