<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;


class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function loginDriver(Request $request){
        $response = array();

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userLevelId' => 2])) {
            $user = Auth::user();
            unset($user->password);
            unset($user->userType);

            $taxiDriver = $user->taxiDriver;
            $taxiDriver->oneSignalUserId = $request->oneSignalUserId;
            $taxiDriver->save();

            $response['success'] = 0;
            $response['driver'] = $user;
        }
        else{
            $response['success'] = 1;
        }
        return $response;
    }

    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function loginWeb(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userLevelId' => 1]) || Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userLevelId' => 3])) {
            return redirect()->intended('dashboard');
        }
        else{
            $request->session()->put('error', 'Username and/or password is incorrect!');
            return redirect()->guest('/login');
        }
    }

    public function logoutWeb()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('/login');
    }

    public function logoutDriver(Request $request)
    {
        $dc = new DriverController;
        $dc->updateState($request);
        return $dc->updateLocation($request);
    }
}
