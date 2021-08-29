<?php

namespace App\Http\Controllers;

use App\SmsStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $students = SmsStudent::where('active_status',1)->get();
        return view('admin.dashboard',compact('students'));
    }
}
