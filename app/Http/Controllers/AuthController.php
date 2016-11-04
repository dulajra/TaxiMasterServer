<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLevel;
use Illuminate\Http\Request;


use Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function loginDriver(Request $request)
    {
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
        } else {
            $response['success'] = 1;
        }
        return $response;
    }

    public function loginCustomer(Request $request)
    {
        $response = array();

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'userLevelId' => 4])) {
            $user = Auth::user();
            unset($user->password);
            unset($user->userType);
            unset($user->userLevelId);
            unset($user->isActive);
            unset($user->username);
            unset($user->remember_token);

            $customer = $user->customer;
            $customer->oneSignalUserId = $request->oneSignalUserId;
            $customer->save();

            $user->email = $customer->email;
            $user->address = $customer->address;

            $response['success'] = 0;
            $response['customer'] = $user;
        } else {
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
        } else {
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

    public function signUp(Request $request)
    {
        $first_name = $request->firstName;
        $last_name = $request->lastName;
        $phone = $request->phone;
        $password = $request->password;
        $r_password = $request->rpassword;
        $username = $request->username;
        if (count(User::where('username', $username)->get()) > 0) {
            $request->session()->put('error', 'User already exist please login!');
            return redirect()->guest('/signup')->withInput();
        } else if ($r_password != $password) {
            $request->session()->put('error', 'Password mismatch!');
            return redirect()->guest('/signup')->withInput();
        } else {
            $user = new User();
            $user->username = $username;
            $user->firstName = $first_name;
            $user->lastName = $last_name;
            $user->phone = $phone;
            $user->userLevelId = 4;
            $user->password = Hash::make($password);
            $user->save();

            Auth::attempt(['username' => $user->username, 'password' => $user->password]);

            return redirect('/');
        }
    }
}
