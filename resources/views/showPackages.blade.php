@extends('layout')
@section('content')

  


<script src="{{ asset('/js/timer.js') }}"></script>
<style>
body{
    text-align: center;
    background: #0000;
  font-family: sans-serif;
  font-weight: 100;
}

h1{
  color: #396;
  font-weight: 100;
  font-size: 40px;
  margin: 40px 0px 20px;
}

#clockdiv{
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 30px;
}

#clockdiv > div{
    padding: 10px;
    border-radius: 3px;
    background: #00BF96;
    display: inline-block;
}

#clockdiv div > span{
    padding: 15px;
    border-radius: 3px;
    background: #00816A;
    display: inline-block;
}

.smalltext{
    padding-top: 5px;
    font-size: 16px;
}
</style>

<h1>Temps restant avant votre rendez-vous</h1>
<div id="clockdiv">
  <div>
    <span class="days"></span>
    <div class="smalltext">Days</div>
  </div>
  <div>
    <span class="hours"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>

  <div class="row text-center">
 <!-- <h1>Select Package</h1> -->
  <img src="img/med.png" > 

  @foreach($packages as $package)
   
    <div class="col-md-4 center-block" style="float:none;">
    <div class="panel panel-default">
      <div class="panel-heading">
    <p><b> <span style= "font-size: large">Prendre un rendez-vous avec le docteur : Docteur Docteur</span> </b><br>
      <a href="booking/calendar/{{ $package->id }}">Choisir une date</a><br>
      </div>
      <div class="panel-body">
    <b>Prix de la consultation: </b>{{ $package->package_price }} Dt<br>
    </div>
</div>
</div>
  @endforeach
</div>
 
@stop
