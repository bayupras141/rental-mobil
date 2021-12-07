@extends('layouts.layout')
@section('title', 'List Transaksi')
@section('content')
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
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            // show modal
        
        });
    </script>
@endpush