@extends('layout',['isConnected',$isConnected])
@section('content')

	@if ($isConnected === true)
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

				<ul class="nav navbar-nav navbar-right">
					<li><a href="/logout">Déconnexion</a></li>
				</ul>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container vertical-center">
	<div class="col-md-6 jumbotron text-center">
    <h1> Réservation effectuée</h1>
		<p> Vous pouvez consulter les informations personnelles du patient et les modifier</p>
@else
<div class="container vertical-center">
<div class="col-md-6 jumbotron text-center">
<h1>Merci !</h1>
<p>Le réservation est effectuée avec succes.Prière de confirmer en appelant 21548796 sinon le rendez-vous sera annulé</p>
@endif

</div>
</div>
@endsection
