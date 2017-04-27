<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Forum;
use App\User;
use App\Tutoriel;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_stars = User::orderBy('score','desc')->skip(0)->take(4)->get();
        $forums     = Forum::orderBy('created_at','desc')->skip(0)->take(4)->get();
        $tutoriels   = Tutoriel::orderBy('created_at','desc')->skip(0)->take(4)->get();

        return view('home',compact('user_stars','forums','tutoriels'));
    }
}
