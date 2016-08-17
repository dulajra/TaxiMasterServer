<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function push(Request $request)
    {
        return OneSignalController::sendMessageToAll($request->title, $request->message);
    }
}
