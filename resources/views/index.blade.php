<?php $link = Request::root(); ?>
<!DOCTYPE html>

@extends('layout',['isConnected',$isConnected])
@section('content')




<style>
/* CSS */
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



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicio landing page template for Health niche</title>

    <!-- css -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="bootstrap/css/nivo-lightbox.css" rel="stylesheet" />
	<link href="bootstrap/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="bootstrap/css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="bootstrap/css/animate.css" rel="stylesheet" />
    <link href="bootstrap/css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">



<div id="page-top" data-spy="scroll" data-target=".navbar-custom">
<div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">

				</div>
			</div>
		</div>

        <div class="container navigation">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="bootstrap/img/logo.png" alt="" width="150" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

          <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#intro">Acceuil</a></li>
				<li><a href="#testimonial">Prendre un rendez-vous</a></li>
				<li><a  href="#foot">Contactez-nous</a></li>


			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
i
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
					<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
					<h2 class="h-ultra">Cabinet du docteur </h2>
					</div>

						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">

						<ul class="lead-list">
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Prendre un rendez-vous</strong><br />Vous pouvez prendre un rendez-vous en ligne</span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Devenez un de nos patients </strong><br />Inscrivez-vous et devenez l'un de nos patients</span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Contactez-nous</strong><br />Contactez-nous en visant l'espace contact </span></li>
						</ul>

						</div>
						</div>


					</div>
					 {!! Form::open(array('action' => 'BookingController@signIn', 'class' => 'form-horizontal', 'data-abide'=>true)) !!}

					<div class="col-lg-6">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Faites confiance à la compétence <small>(inscription gratuite)</small></h3>
									</div>
									<div class="panel-body">
									<form role="form" class="lead">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label style="margin-left:10px;">Nom</label>
													<span style="color:red">{{ $errors != null ? $errors->erreurs->first('last_name') : '' }}</span>

													<input type="text"  name="fname" id="fname" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Prénom</label>
												<span style="color:red">{{ $errors != null ? $errors->erreurs->first('first_name') : ''}}</span>
													<input type="text" name="lname" id="lname" class="form-control input-md">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label style="margin-left:10px;">Email</label>
												<span style="color:red">{{ $errors != null ? $errors->erreurs->first('email') : '' }}</span>

													<input type="email" name="email" id="email" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Numéro de téléphone</label>
													<span style="color:red"> {{ $errors != null ? $errors->erreurs->first('contact_number') : '' }}</span>
													<input type="text" name="number" id="number" class="form-control input-md">

												</div>
											</div>
										</div>

										<input type="submit" value="S'inscrire" class="btn btn-skin btn-block btn-lg">

										<p class="lead-footer">Nous vous contacterons par téléphone et e-mail plus tard</p>

									</form>
								</div>
							</div>

						</div>
						</div>
					</div>
					   {!! Form::close() !!}


				</div>
			</div>
		</div>
    </section>

	<!-- /Section: intro -->





	<!-- Section: services -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

		<div class="container">

        <div class="row">


	<div class=" text-center">
 		<h5>   Choisir une date</h5>
 			 <p id="currentDate" style="color: #71b497; font-size:large;">  </p>
	</div>

	<div class=" text-center">
    	<div id="calendar" > </div>
      		<div id="daySelect">
      		</div>
    		<div >
       		 <p id="dayTimes"></p>
    		</div>
  	  </div>
	</div>
        </div>
		</div>
		<br><br><br><br>

	</section>
	<!-- /Section: services -->

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
</div>

 <!--Modal 2 -->
<div id="oModal2" class="oModal">
  <div>
    <header>
      <a href="#fermer" title="Fermer la fenêtre" class="droite">X</a>
 			Hello World
   {!! Form::close() !!}
     </header>

     <footer class="cf">
      <a href="#fermer" class="btn droite" title="Fermer la fenêtre">Fermer</a>
     </footer>
  </div>
</div>



	<footer id="foot">

		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>A propos de Medical</h5>
						<p>
						Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
						</p>
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Information</h5>
						<ul>
							<li><a href="#">Accueil</a></li>
							<li><a href="#">Laboratoire</a></li>
							<li><a href="#">Triatement médical</a></li>
							<li><a href="#">Termes & conditions</a></li>
						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Centre Médical</h5>
						<p>
						Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
						</p>
						<ul>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Saturday, 8am to 10pm
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +62 0888 904 711
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> hello@medical.com
							</li>

						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>NOTRE EMPLACEMENT</h5>
						<p>Tunis rue ...</p>

					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Nous suivre</h5>
						<ul class="company-social">
								<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
								<li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInLeft" data-wow-delay="0.1s">
					<div class="text-left">
					<p>&copy;Copyright 2015 - Medical. Tous les droits sont résevés.</p>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInRight" data-wow-delay="0.1s">

                    <!--
                        All links in the footer should remain intact.
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
					</div>
				</div>
			</div>
		</div>
		</div>
	</footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.easing.min.js"></script>
	<script src="bootstrap/js/wow.min.js"></script>
	<script src="bootstrap/js/jquery.scrollTo.js"></script>
	<script src="bootstrap/js/jquery.appear.js"></script>
	<script src="bootstrap/js/stellar.js"></script>
	<script src="bootstrap/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="bootstrap/js/owl.carousel.min.js"></script>
	<script src="./bootstrap/js/nivo-lightbox.min.js"></script>
    <script src="bootstrap/js/custom.js"></script>
    <script src="js/calendar.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link href="{{ asset('/css/paper.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/core.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/normalize.css') }}" rel="stylesheet">

  <!-- Datepicker css -->
  <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">

  <!-- Modernizr -->
  <script src="{{ asset('/js/vendor/modernizr.js') }}"></script>

  <!-- JQuery must be in the header for the calendar to work, I don't know why... -->
 <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->

	<script src="js/jquery-ui.custom/jquery.js"></script>
    <script src="js/jquery-ui.custom/jquery-ui.js"></script>

  <!-- Latest compiled and minified JavaScript Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

  <!-- Moment -->
  <script src="{{ asset('/js/moment.js') }}"></script>



</body>

</html>
@stop
