<?php

namespace App\Http\Controllers;

use App\Customer;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\TaxiDriver;
use App\Taxi;
use App\DriverUpdate;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function showViewPage(User $user)
    {
        return view('admin.viewAccount', compact('user'));
    }

    public function showEditPage(User $user)
    {
        return view('admin.editAccount', compact('user'));
    }

    public function showNewUserPage()
    {
        $taxis = Taxi::whereNotIn('id', TaxiDriver::whereNotNull('taxiId')->get(['taxiId']))->get();
        return view('admin.newAccount', compact('taxis'));
    }

    public function deleteUser(Request $request)
    {
        return json_encode(User::where('id', $request->id)->update(['isActive' => false]));
    }

    public function updateUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $name = $user->username;
        $file = $request->file('image');
        if (!empty($file)) {
            $file->move(public_path('/img/users/'), $name . '.' . $file->getClientOriginalExtension());
            $user->image = '/img/users/' . $name . '.' . $file->getClientOriginalExtension();
        }
        $result = $user->save();

        if ($result) {
//            return redirect('/accounts/view');

            return back();
        } else {
            $errors = new MessageBag(['msg' => 'Username or password is incorrect']);
            return back()->withErrors($errors);
        }
    }

    public function createNewUser(Request $request)
    {
        if (count(User::where('username', $request->username)->get()) > 0) {
            $errors = new MessageBag(['msg' => 'Username already exists!']);
            return back()->withErrors($errors)->withInput();
        }
        if (count(User::where('firstName', $request->firstName)->where('lastName', $request->lastName)->get()) > 0) {
            $errors = new MessageBag(['msg' => 'User with the same full name already existstransac!']);
            return back()->withErrors($errors)->withInput();
        }
        if (count(User::where('phone', $request->phone)->get()) > 0) {
            $errors = new MessageBag(['msg' => 'Mobile phone already exists!']);
            return back()->withErrors($errors)->withInput();
        }
        if ($request->userType == 2) {
            if (count(TaxiDriver::where('licenceNo', $request->licenceNo)->get()) > 0) {
                $errors = new MessageBag(['msg' => 'Licence Number already exists!']);
                return back()->withErrors($errors)->withInput();
            }
        }

        try {
            $user = new User;
            $user->userLevelId = $request->userType;
            $user->username = $request->username;
            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->isActive = 1;
            $user->save();

            if ($request->userType == 2) {
                $user = User::where(['username' => $request->username])->first();
                $taxiDriver = new TaxiDriver;
                $taxiDriver->licenceNo = $request->licenceNo;
                if ($request->taxiId === null || $request->taxiId === '') {
                    $taxiDriver->taxiId = null;
                } else {
                    $taxiDriver->taxiId = $request->taxiId;
                }
                $user->taxiDriver()->save($taxiDriver);

                $taxiDriver = TaxiDriver::find($user->id);
                $driverUpdate = new DriverUpdate;
                $driverUpdate->latitude = 0.0;
                $driverUpdate->longitude = 0.0;
                $driverUpdate->stateId = 1;
                $taxiDriver->driverUpdate()->save($driverUpdate);
            }
        } catch (\Exception $e) {
            $errors = new MessageBag(['msg' => 'Something went wrong. Please try again!']);
            return back()->withErrors($errors);
        }
        return redirect('/accounts/view');
    }

    public function signUpUser(Request $request)
    {
        if (count(User::where('username', $request->username)->get()) > 0) {
            return array('success' => 1);
        }
        if (count(User::where('firstName', $request->firstName)->where('lastName', $request->lastName)->get()) > 0) {
            return array('success' => 2);
        }
        if (count(User::where('phone', $request->phone)->get()) > 0) {
            return array('success' => 1);
        }

        try {
            $user = new User;
            $user->userLevelId = 4;
            $user->username = $request->phone;
            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->isActive = 1;
            $user->save();

            $user = User::where(['phone' => $request->phone])->first();
            $customer = new Customer;

            if ($request->oneSignalUserId === null || $request->id === '') {
                $customer->oneSignalUserId = null;
            } else {
                $customer->oneSignalUserId = $request->oneSignalUserId;
            }
            $result = $user->customer()->save($customer);
            if ($result) {
                return array('success' => 0);
            } else {
                return array('success' => -1);
            }

        } catch (\Exception $e) {
            return array('error' => $e, 'success' => -1);
        }
    }

    public function changePassword(Request $request)
    {
        $username = $request->username;
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        $user = User::where('username', $username)->first();

        if (Auth::attempt(['username' => $username, 'password' => $oldPassword])) {
            $user->password = Hash::make($newPassword);
            $user->save();
            return array('success' => 0);
        } else {
            return array('success' => 1);
        }
    }
}
