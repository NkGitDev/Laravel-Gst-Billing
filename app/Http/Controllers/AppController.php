<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;   // For Eloquent ORM
use App\Models\GstBill;
use Illuminate\Support\Facades\DB;  // For Query Builder
use Illuminate\Support\Facades\Auth;


class AppController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }
     
}
