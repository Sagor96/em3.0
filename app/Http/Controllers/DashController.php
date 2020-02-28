<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function showAdmin()
    {
        $data = [];
        return view('admin.dashboard', $data);
    }
}
