<?php

namespace App\Http\Controllers;

use App\Notification;
use App\ThankMsg;
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
        $this->middleware('auth', ['except' => ['welcome']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(){
        $notifs = Notification::all();
        $thankMsgs = ThankMsg::all();

        return view('welcome')->with(["notifs" => $notifs, "thankMsgs" => $thankMsgs]);
    }

    public function cms_otions(){
        return view('cms_options');
    }
}
