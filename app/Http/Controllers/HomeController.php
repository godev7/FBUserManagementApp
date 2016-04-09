<?php

namespace App\Http\Controllers;

use App\FbUser;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FbUserService;

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
     * @param $service
     * @return \Illuminate\Http\Response
     */
    public function index(FbUserService $service)
    {
        $fb_users = $service->getFbUsers();

        return view('home', ['fb_users' => $fb_users]);
    }
}
