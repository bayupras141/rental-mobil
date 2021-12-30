@extends('layouts.app')
@section('content')
{{-- card --}}
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <table class="data-table table table-sm table-bordered table-striped" id="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        {{-- format rupiah --}}
                        <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- end card --}}


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
            ajax: "{{ route('paket.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'harga', name: 'harga', 
                    render: (data)=>{
                        return rupiah(data);
                    }
                },
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });


    });
</script>
@endsection