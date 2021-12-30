@extends('layouts.app')
@section('style')
<style>
    html {
        scroll-behavior: smooth;
    }
    .garis {
        max-width: 60%;
        border: 1px solid #535351;
    }
</style>
@endsection
@section('content')
<div class="row px-4">
    <div class="col-lg-8">
        <img src="{{asset('storage/'.$data->foto)}}" alt="" style="max-width: 100%;">
        <div class="row text-center my-5" style="max-width: 80%;">
            <div class="col-lg-12">
                <h1>{{ $data->nama }}</h1>
                <hr class="garis">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>
<hr>


@endsection
    