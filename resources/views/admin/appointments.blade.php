@extends('admin/layout')
@section('content')

<script type='text/javascript' src='../jquery/jquery-1.8.1.min.js'></script>

<script type='text/javascript' src='../jquery/jquery-ui-1.8.23.custom.min.js'></script>

<script type='text/javascript' src='../fullcalendar/fullcalendar.min.js'></script>

<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.css' />


<script type='text/javascript'>

$(document).ready(function() {

var <a href="http://www.jqueryscript.net/time-clock/">date</a> = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

$('#calendar').fullCalendar({
editable: true,
events: [
{
title: 'All Day Event',
start: new Date(y, m, 1)
},
{
title: 'Long Event',
start: new Date(y, m, d-5),
end: new Date(y, m, d-2)
},
{
id: 999,
title: 'Repeating Event',
start: new Date(y, m, d-3, 16, 0),
allDay: false
},
{
id: 999,
title: 'Repeating Event',
start: new Date(y, m, d+4, 16, 0),
allDay: false
},
{
title: 'Meeting',
start: new Date(y, m, d, 10, 30),
allDay: false
},
{
title: 'Lunch',
start: new Date(y, m, d, 12, 0),
end: new Date(y, m, d, 14, 0),
allDay: false
},
{
title: 'Birthday Party',
start: new Date(y, m, d+1, 19, 0),
end: new Date(y, m, d+1, 22, 30),
allDay: false
},
{
title: 'Click for Google',
start: new Date(y, m, 28),
end: new Date(y, m, 29),
url: 'http://google.com/'
}
]
});

});

</script>
<div class="col-lg-8">
	<div id="error"></div>
	<div id="calendar"></div>
</div>
<div class="col-lg-4">
	<legend> Détails </legend>
	<div id="appointment-details">
		<p>Cliquez sur un rendez-vous pour avoir les détails .</p>
	</div>
</div>

<script src="{{ asset('/js/admin/appointments.js') }}"></script>
@endsection
