<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use GuzzleHttp\Client;

class GuzzleController extends BaseController
{

    public function index()
    {
      $client = new Client();//['base_url' => 'http://localhost:8000']
      //$response = $client->get('/login');
      return $response = $client->get('http://localhost:8000/person/guzzle');

    }


}
