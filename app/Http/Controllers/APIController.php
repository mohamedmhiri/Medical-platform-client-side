<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

// Model Usage
use App\Models\BookingDateTime;

class APIController extends BaseController
{

    // Get available days
    function GetAvailableDays() {
        return response()->json(BookingDateTime::all());
    }

}
