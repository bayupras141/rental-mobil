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
<<<<<<< HEAD
<div class="row px-4">
    <div class="col-lg-8">
        <img src="{{asset('storage/'.$data->foto)}}" alt="" style="max-width: 100%;">
        <div class="row text-center my-5" style="max-width: 80%;">
            <div class="col-lg-12">
                <h1>{{ $data->nama }}</h1>
                <hr class="garis">
=======

<div class="container">
<div class="">
          <div class="col">
            <div >
           

<p class="card-text" style="font-family: serif; font-size: 20px;    
"><h5 style="text-align: center; background-color: #cbc6e1;
    height: 40px;
    padding-top: 8px;"> </h5></p>
<?php
  dd($dt);
?>

<div class="card-body">
              <p class="card-text" style="font-family: serif; font-size: 20px;  "><p style="font-size: 18px; font-family: 'Times New Roman', Arial, sans-serif;">Jenis Sewa : {{ $u.nama }}</p></p>
              </div>
              
>>>>>>> 289885537c2abea9c57c3838f83f449da139ed79
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
    