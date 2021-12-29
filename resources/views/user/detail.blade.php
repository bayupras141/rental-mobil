@extends('layouts.app')
@section('content')

<div class="container">
<div class="">
          <div class="col">
            <div >
                <img src="{{asset('storage/'.$data->foto)}}" data-holder-rendered="true" style="display: block;
      margin: 0px auto;
      text-align: center;
      width: 650px;
      height: 400px;
      margin-top: 90px;
">

<p class="card-text" style="font-family: serif; font-size: 20px;    
"><h5 style="text-align: center; background-color: #cbc6e1;
    height: 40px;
    padding-top: 8px;">{{ $data->nama }} </h5></p>
<div class="card-body">
              @foreach($paket as $a)
              <p class="card-text" style="font-family: serif; font-size: 20px;  "><p style="font-size: 18px; font-family: 'Times New Roman', Arial, sans-serif;">Jenis Sewa : {{ $a->nama }}</p></p>
                <p class="card-text" style="font-family: serif; font-size: 20px;  "><p style="font-size: 18px; font-family: 'Times New Roman', Arial, sans-serif;" >Harga Sewa : {{ $a->harga }} </p></p>
                @endforeach 
              </div>

            </div>

<button type="button" style="width: 1270px; background-color: #7a60efd6;" class="btn btn-primary"><FONT><b>B      O      O      K      I      N      G</b></FONT></button>
          </div>

        </div>
        
      </div>
      
@endsection


  
    