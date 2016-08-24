<?php


// API Routes
	Route::group(['prefix' => 'api'], function()
	{
		// Customer API Routes
		Route::get('get-available-days', 'APIController@GetAvailableDays');

		// Admin API Routes
		Route::get('get-all-appointments', 'AdminAPIController@GetAllAppointments');
		Route::get('get-appointment-info/{id}', 'AdminAPIController@GetAppointmentInfo');
		Route::get('get-all-availability', 'AdminAPIController@GetAllAvailability');
		Route::any('set-availability', 'AdminAPIController@SetAvailability');
		Route::get('delete-appointment/{id}', 'AdminAPIController@DeleteAppointment');
		Route::get('confirm/{input}','BookingController@anyConfirm');

	});
	Route::get('logout', 'AdminController@logout');
	// Admin Routes
	Route::group(['prefix' => 'admin'], function()
	{
		Route::get('/',['as'=>'signin','uses'=> 'AdminController@index']);
		Route::post('login', 'AdminController@login');

		// Appointment Routes
		Route::get('appointments', 'AdminController@appointments');
		Route::get('makeAppointment','AdminController@makeAppointment');

		// Availability Routes
		Route::get('availability', 'AdminController@availability');
		Route::post('add/availability', 'AdminController@addAvailability');

		// Configuration Routes
		Route::get('configuration', 'AdminController@configuration');

		// Package Routes
		Route::get('packages', 'AdminController@packages');
		Route::get('edit-package/{package_id}', 'AdminController@editPackage');
		Route::post('update-package/{package_id}', array('as' => 'package.update'), 'AdminController@updatePackage');
	});

	Route::get('/', 'BookingController@getIndex');
	Route::controller('booking', 'BookingController');
	Route::controller('admin', 'AdminController');
	Route::get('timer', 'BookingController@getEndTime');
	Route::get('details/{id}','BookingController@getDetails');
	Route::get('checkAvail/{date}','AdminController@checkAvail');

	Route::get('Conpatients','BookingController@consumePatients');
	Route::post('signIn/{input}','BookingController@signIn');

	Route::get('consumeUpdatePatient','BookingController@consumeUpdatePatient');
	Route::get('patientsAdmin','BookingController@getPatientsAdmin');
	Route::get('idPatientSubmit/{idCustomer}','BookingController@setIdCustomerInSession');
	Route::get('submitAppointment','BookingController@submit_appointment');

	//used by server side
	//through JWT
	Route::get('patients/{name}','PatientController@getPatients');
	Route::get('deletePatient/{email}/{name}','PatientController@deletePatient');
	Route::get('updatePatient/{jsonInfo}/{name}','PatientController@updatePatient');

	//test
	Route::get('try/{name}','PatientController@tokenTry');

	//trial guzzlehttp
	Route::get('guzzle','GuzzleController@index');

	//login with guzzle Http
	Route::group(['prefix' => 'log'], function()
	{
		Route::get('/',['as' => 'tmp_user', 'uses' => 'LoginController@prepareLogin']);
	//	Route::get('auth/{name}',['as' => 'auth_user', 'uses' => 'LoginController@getLogin']);
	});
