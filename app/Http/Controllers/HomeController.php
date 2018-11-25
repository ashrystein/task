<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $res = DB::table('social_posts')->get();
        $coms = DB::table('commentsTable')->get(); 
        $data =['res'=> $res , 'coms' => $coms];
        //echo $data['coms'];
        return view('home',compact('data'));
    }
}
