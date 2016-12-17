<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\User;
class DashboardController extends Controller
{
    public function index()
    {
      if (Gate::allows('isStudent', Auth::user())){
        return view('student.dashboard');
      }
      else if (Gate::allows('isTeacher', Auth::user())) {
        return view('teacher.dashboard');
      }
      else if (Gate::allows('isAdmin', Auth::user())) {
        return view('administrator.dashboard');
      }
      else {
        dd(Auth::user());
      }
    }
}
