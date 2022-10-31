<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function store()
    {
        die(auth()->user()->email);
        auth()->logout();

        return redirect()->route('login');
    }
}
