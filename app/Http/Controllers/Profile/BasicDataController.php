<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicDataController extends Controller
{
    public function index()
    {
        return view('profile.basic-data.index');
    }
}
