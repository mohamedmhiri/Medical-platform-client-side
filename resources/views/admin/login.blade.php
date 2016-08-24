@extends('admin/layout')
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css" rel="stylesheet">
  <link href="{{ asset('/css/paper.css') }}" rel="stylesheet">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

  <script src="{{ asset('/js/moment.js') }}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
</head>
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">Se connecter à l'application</div>
        <div class="panel-body">
          @if ($errors != 'None')
            <div class="alert alert-danger">
              <strong>Nom d'utilisateur ou mot de passe non valide</strong>
            </div>
          @endif

          {!! Form::open(array('url' => 'admin/login', 'class' => 'form-horizontal')) !!}

          <div class="form-group">
            <label for="username" class="col-lg-2 control-label">Nom d'utilisateur</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="username" name="username" autofocus>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-lg-2 control-label">mot de passe</label>
            <div class="col-lg-8">
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Se connecter</button>
          </div>
          <br><br><br>


        </div>
      </div>
    </div>
  </div>

  </div>

{!! Form::close() !!}
</body>
</html>
@endsection
