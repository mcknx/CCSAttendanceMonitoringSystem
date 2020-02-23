<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard() {
        $user = Auth::user();

        return view('userdashboard', ['user' => $user]);
    }
}
