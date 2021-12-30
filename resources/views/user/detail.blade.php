@extends('layouts.app')
@section('content')

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
              
            </div>

<button type="button" style="width: 1270px; background-color: #7a60efd6;" class="btn btn-primary"><FONT><b>B      O      O      K      I      N      G</b></FONT></button>
          </div>

        </div>
        
      </div>
      
@endsection


  
    