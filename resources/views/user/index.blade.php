@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @forelse ($data as $a)
    <div class="col">
      <div class="card shadow-sm">
          <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('storage/'.$a->foto)}}" data-holder-rendered="true">
        <div class="card-body">
          <p class="card-text">{{ $a->nama }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('detail',$a->id) }}"> View</a>
        </div>
        @if($a->status == "Tersedia")
          <span class="badge badge-success">
            <small class="text-muted" style="color: #fff !important;">{{$a->status}}</small>
          </span>
        @else
          <span class="badge badge-danger">
            <small class="text-muted" style="color: #fff !important;">{{$a->status}}</small>
          </span>
        @endif
      </div>
    </div>
  </div>
</div>
@empty
<div class="col">
  <div class="card shadow-sm">
    <div class="card-body">
      <p class="card-text">Tidak ada data</p>
    </div>
  </div>
</div>
@endforelse
  </div>
</div>
@endsection