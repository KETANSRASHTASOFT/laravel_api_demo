<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use App;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','locale']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * set the specified cookie in browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response (ajax call)
     */
    public function setLocale(Request $request){
        $response = new Response("true");
        $response->withCookie(cookie('locale', $request->locale,129600));
        $_SESSION['locale'] = $request->locale;
        return $response;
    }
}
