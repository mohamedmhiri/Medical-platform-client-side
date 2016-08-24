<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Appointment;
use App\Models\Admin;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Configuration;
use App\Models\TimeInterval;
use Session;
use Illuminate\Support\Facades\Hash;
use Input;
use Auth;
use View;
class AdminController extends BaseController
{

  /**
  *function to test weather there is an authentified user
  * or not
  */
  public function isConnected()
  {
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
      return false;
    else
      return true;
  }
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
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
    {
      $errors = "None";
      return view('admin/login')->with('errors', $errors);
    }
    else
    {
        return view('admin/BookAppointment_admin',['isConnected'=> $this->isConnected()]);
    }

  }

  /**
   * Function to attempt authorization, and redirect to admin page if successful, redirect to login with errors if not
   */
  public function login()
  {
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
    {
      $input = Input::all();
      if (Auth::attempt(['username' => $input['username'], 'password' => $input['password'] ]))
      {
        $auth_user=Admin::where('password','=','$2y$10$MCKnCtM0tro/jHMCceVZGe8pTSCxxy/ZItIgEB7HezTAiPu0bc9gG')->first();
        $auth_user->isConnected=1;
        $auth_user->save();
        return redirect('admin/appointments');
      }
      else
      {
        $errors = "Invalid username or password";
        return view('admin/login')->with('errors', $errors);
      }
    }
    else
    {
        return redirect('admin/appointments');
    }

  }
  /*
  * Function to logout
  */
  public function logout()
  {
    $authentifiedUser=Auth::user();
    $authentifiedUser->isConnected=0;
    Auth::logout();
    Session::flush();
    $authentifiedUser->save();
    return redirect('/admin');
  }
  public function appointments()
  {
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
    {
      $errors = "None";
      return view('admin/login')->with('errors', $errors);
    }
    else
    {
        return view('admin/appointments');
    }

  }

  public function availability()
  {
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
    {
      $errors = "None";
      return view('admin/login')->with('errors', $errors);
    }
    else
    {
        return view('admin/availability');
    }

  }

  public function configuration()
  {
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
    {
      $errors = "None";
      return view('admin/login')->with('errors', $errors);
    }
    else
    {
      $configuration = Configuration::with('timeInterval')->first();
      return view('admin/configuration', ['configuration' => $configuration]);
    }

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
