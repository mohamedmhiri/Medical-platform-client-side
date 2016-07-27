<?php
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Configuration;
use App\Models\TimeInterval;

use Input;
use Auth;
use View;
class AdminController extends Controller {
  
  /**
   * Function to retrieve the index page
   */
  public function index()
  {
    $errors = "None";
    return view('admin/login')->with('errors', $errors);
  }

  public function makeAppointment()
  {
    return view('admin/BookAppointment_admin');
  }
  
  /**
   * Function to attempt authorization, and redirect to admin page if successful, redirect to login with errors if not
   */
  public function login()
  {
    $input = Input::all();
    if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password'] ))) {
      return redirect('admin/appointments');
    } else {
      $errors = "Invalid username or password";
      return view('admin/login')->with('errors', $errors);
    }
  }

  public function appointments()
  {
    return view('admin/appointments');
  }

  public function availability()
  {
    return view('admin/availability');
  }

  public function configuration()
  {
    $configuration = Configuration::with('timeInterval')->first();
    return view('admin/configuration', ['configuration' => $configuration]);
  }



  public function anySetTime()
  {
    dd('test');
  }

  public function checkAvail($date)
  {
    $boolean =Appointment::where('appointment_datetime',date('Y-m-d H:i:s', strtotime($date)))->first();
    return response()->json($boolean);
  } 
}
