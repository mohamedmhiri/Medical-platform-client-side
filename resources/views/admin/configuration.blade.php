@extends('admin/layout')
@section('content')
<div class="container">
	<h1>Configuration</h1>
</div>

<div class="row">
	<div class="container">
		<legend>Intervalles de temps </legend>
		<p> Lors de la configuration disponibilité. l'application utilisera cet intervalle pour segmenter les dates de rendez-vous disponibles .</p>
		<p>L'intervalle de temps est actuellement fixé à <strong>{{ $configuration->timeInterval->interval }} </strong> {{ $configuration->timeInterval->metric }} </p>
		{!! Form::open(['action' => 'AdminController@anySetTime', 'class' => 'form-horizontal', 'data-abide' => true]) !!}
	</div>
</div>

@endsection
