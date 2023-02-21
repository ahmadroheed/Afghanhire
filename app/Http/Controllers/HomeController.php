<?php

namespace App\Http\Controllers;

use App\anham_applicants;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $totalApplicants = anham_applicants::all()->count();
        $totalUsers = User::all()->count();
        return view('admin.dashboard.index',compact('totalApplicants','totalUsers'));
    }
}
