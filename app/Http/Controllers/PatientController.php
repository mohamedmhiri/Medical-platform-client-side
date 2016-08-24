<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Models\Customer;
use App\Models\Appointment;
use Response;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class PatientController extends BaseController
{

    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        //$this->middleware('jwt.auth');
    }
    //try
    public function tokenTry($name)
    {
      try
      {
        $user = User::where('name','=',$name)->first();


        if (! $token = JWTAuth::fromUser($user))
        {

          return response()->json(['user_not_found'], 404);
        }
        return response()->json($name);

      }
      catch (Exception $e)
      {
        return response()->json(['token_absent'], 404);
      }
    }
    public function tokenGenerator($name)
    {
      try {
            $user = User::where('name','=',$name)->first();


            if (! $token = JWTAuth::fromUser($user)) {

              return response()->json(['user_not_found'], 404);
            }


        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        return $token;
    }

    //list all patients to be used in server side
    public function getPatients($name)
    {
      if($this->tokenGenerator($name))
      {
        $patients = Customer::all();
        return response()->json($patients);
      }
      else {
        return response()->json("Token_is_absent");
      }

    }

    //delete patient through server side
    public function deletePatient($email,$name)
    {
       if($this->tokenGenerator($name))
       {
         $customer=Customer::where('email','=',$email)->first();
         $appointments= Appointment::where('customer_id','=',$customer->id)->delete();
         $patient=Customer::where('email','=',$email)->delete();
       }
       else {
         return response()->json("Token_is_absent");
       }

     }
     //update patient through server side
    public function updatePatient($jsonInfo,$name)
    {
         if($this->tokenGenerator($name))
         {
           $json_dec=json_decode($jsonInfo);
           $patient=Customer::where('email','=',$json_dec->old_email)->first();
           $patient->last_name=$json_dec->last_name;
           $patient->first_name=$json_dec->first_name;
           $patient->contact_number=$json_dec->contact_number;
           $patient->email=$json_dec->new_email;
           $patient->save();
         }
         else {
           return response()->json("Token_is_absent");
         }

    }

}
