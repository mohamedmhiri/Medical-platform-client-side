<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Auth;
use Carbon\Carbon;
use App\Models\Client as auth_user;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;

class LoginController extends BaseController
{
    

    /**
    *return a new user to be authentified
    *
    */
    public function prepareLogin()
    {
      if(Auth::user()===null)
        return redirect()->route('signin');
      else {
        $name=Auth::user()->username;
        $client = new Client(['base_url' => 'http://localhost:8000']);
        $response = $client->get('log/'.$name);
        $name= json_decode($response->getBody(),true)['name'];
        $id= json_decode($response->getBody(),true)['id'];
        return redirect('http://localhost:8000/auth/'.$name.'/'.$id);

      }

    }
    /**
    *
    *
    */
    public function getLogin($name)
    {
      return Hash::make('admin');
    }
}
