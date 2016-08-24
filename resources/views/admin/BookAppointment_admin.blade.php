@extends('layout',['isConnected',$isConnected])
<style>
.ui-autocomplete {
    z-index: 5000;
}
.ui-helper-hidden-accessible { display:none; }
.cf:before,
.cf:after {
  content:"";
  display:table;
}
.cf:after {
  clear:both;
}
.droite {
  float:right;
}
.oModal {
  position: fixed;
  z-index: 99999;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.8);
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}

.oModal:target {
  opacity:1;
  pointer-events: auto;
}

.oModal:target > div {
  margin: 10% auto;
  transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
}

.oModal > div {
  max-width: 600px;
  position: relative;
  margin: 1% auto;
  padding: 8px 8px 8px 8px;
  border-radius: 5px;
  background: #eee;
  transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
}

.oModal > div header,.oModal > div footer {
  border-bottom: 1px solid #e7e7e7;
  border-radius: 5px 5px 0 0;
}
.oModal .footer {
  border:none;
  border-top: 1px solid #e7e7e7;
  border-radius: 0 0 5px 5px;
}

.oModal > div h2 {
  margin:0;
}

.oModal > div .btn {
  float:right;
}

.oModal > div section,.oModal > div > header, .oModal > div > footer {
  padding:15px;
}



</style>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Rendez-vous</a>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">


        <ul class="nav navbar-nav navbar-left">
          <!-- <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
            <ul class="nav navbar-nav">
              <li><a href="{{ url('admin/appointments') }}">Liste des rendez-vous<span class="sr-only">(current)</span></a></li>
              <li><a href="{{ url('admin/availability') }}">Disponibilité</a></li>
              <li><a href="{{ url('admin/makeAppointment') }}">Prendre un rendez-vous pour un client</a></li>
              <li><a href="{{ url('log') }}">Gestion</a></li>
              <li><a href="{{ url('admin/configuration') }}">Configuration</a></li>

            </ul>

        </ul>
        @if ($isConnected === true)
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/logout">Déconnexion</a></li>
        </ul>
        @endif
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

  <div id="oModal" class="oModal">
    <div>
      <header>
        <a href="#fermer" title="Fermer la fenêtre" class="droite">X</a>
   {!! Form::open(array('action' => 'BookingController@anyConfirm', 'class' => 'form-horizontal', 'data-abide'=>true)) !!}

  <fieldset>
    <legend>Customer Information</legend>
    <input type="hidden" class="form-control" name="pid" id="pid" value="">
    <!-- First Name Input -->
    <div class="form-group">
      <label for="fname" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="fname" id="fname" placeholder="First">
      </div>
    </div>

    <!-- Last Name Input -->
    <div class="form-group">
      <label for="lname" class="col-lg-2 control-label">Last Name</label>
      <div class="col-lg-10">
         <input type="text" class="form-control" name="lname" id="lname" placeholder="Last">
      </div>
    </div>

    <!-- Contact Number -->
    <div class="form-group">
      <label for="number" class="col-lg-2 control-label">Contact Number</label>
      <div class="col-lg-10">
         <input type="text" class="form-control" name="number" id="number" placeholder="5555555555">
      </div>
    </div>

    <!-- Email -->
     <div class="form-group">
      <label for="email" class="col-lg-2 control-label">E-Mail</label>
      <div class="col-lg-10">
         <input type="text" class="form-control" name="email" id="email" placeholder="you@example.com">
      </div>
    </div>


    <div class="text-center">
      <button  type="submit" class="btn btn-primary"><input type="submit" href="#oModal2"  value="Envoyer">
  </button>
    </div>


    </div>

     {!! Form::close() !!}
       </header>

       <footer class="cf">
        <a href="#fermer" class="btn droite" title="Fermer la fenêtre">Fermer</a>
       </footer>
    </div>
  <!-- <div style="padding-top:50px;">
      {!! Form::open(array('action' => 'BookingController@anyConfirm', 'class' => 'form-horizontal', 'data-abide'=>true)) !!}


          <div class="ui-widget">
  <input type="hidden" class="form-control" name="pid" id="pid" value="">

          <div class="form-group">
           <label for="fname" class="col-lg-2 control-label">Nom du patient</label>
           <div class="col-lg-10">
               <input type="text" class="form-control" name="fname" id="fname" placeholder="Nom et Prénom">
           </div>
          </div>

          </div>


      {!! Form::close() !!}



      </div> -->


<div class="container">
 <div class="row">
  <div class=" text-center">

       <p id="currentDate" style="color: #71b497; font-size:large;">  </p>
  </div>
  <div class=" text-center">
      <div id="calendar" > </div>
          <div id="daySelect"></div>
      <div >
          <p id="dayTimes"></p>
      </div>
  </div>
 </div>
</div>


<script>


var url = document.getElementById("url").textContent;
var jdays = [];
cDate = moment();
$('#currentDate').text("La date d'aujourd'hui est " + cDate.format("MMMM Do, YYYY") );

$(document).ready(function($){
  createCalendar();
});

/**
 * Instantiates the calendar AFTER ajax call
 */
function createCalendar()
{

  $.get(url+"/api/get-available-days", function(data) {
    $.each(data, function(index, value) {
      jdays.push(value.booking_datetime);
    });

    //My function to intialize the datepicker
    $('#calendar').datepicker({
      inline: true,
      minDate: 0,
      dateFormat: 'yy-mm-dd',
      beforeShowDay: highlightDays,
      onSelect: getTimes,
    });
  });
}

/**
 * Highlights the days available for booking
 * @param  {datepicker date} date
 * @return {boolean, css}
 */
function highlightDays(date)
{
  date = moment(date).format('YYYY-MM-DD');
  for(var i = 0; i < jdays.length; i++) {
    jDate = moment(jdays[i]).format('YYYY-MM-DD');
    if(jDate == date) {
      return[true, 'available'];
    }
  }
  return false;
}

/**
 * Gets times available for the day selected
 * Populates the daytimes id with dates available
 */
function getTimes(d)
{
  var dateSelected = moment(d);
  document.getElementById('daySelect').innerHTML = dateSelected.format("MMMM Do, YYYY");
  $.get(url+"/booking/times?selectedDay="+d, function(data) {
    $('#dayTimes').empty();
    $('#dayTimes').append('<h6>Times Available</h6>');
    for(var i in data) {
      var rdate = data[i].booking_datetime;
      rdate = rdate.split(" ");
      $("#dayTimes").append("<a id='time' href='{{ URL::to('submitAppointment') }}'' >" + rdate[1] + "</a><br>");

      document.getElementById("pid").value = data[i].id;
      //alert(data[i].id);
            $.get(url+"/details/"+data[i].id);
}
});
}
function getTimes(d)
{
	var dateSelected = moment(d);
	document.getElementById('daySelect').innerHTML = dateSelected.format("MMMM Do, YYYY");
	$.get(url+"/booking/times?selectedDay="+d, function(data) {
		$('#dayTimes').empty();
		$('#dayTimes').append('<h6>Times Available</h6>');
		for(var i in data) {
			var rdate = data[i].booking_datetime;
			rdate = rdate.split(" ");
			$("#dayTimes").append('<a id="time" href="#oModal">' + rdate[1] + '</a><br>');
			document.getElementById("pid").value = data[i].id;

            $.get(url+"/details/"+data[i].id);
}
});
}



</script>

<script type="text/javascript">
 $(function() {
var url = document.getElementById("url").textContent;

 $.getJSON("{{ URL::to('patientsAdmin') }}", function (data) {
    $( "#fname" ).autocomplete({
        minlength: 1,
        source: data,
            select : function(event, ui){
             $.get(url+"/idPatientSubmit/"+ui.item.id);

    }



});
  });
  });

</script>
@endsection
