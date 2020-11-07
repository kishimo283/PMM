<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function top(Request $request) {
        $user = Auth::user();
        $param = ['user' => $user];
        return view('top', $param);
    }
}
