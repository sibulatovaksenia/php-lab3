<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {

        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('admin.dashboard');
    }
}
