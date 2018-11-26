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
    public function index(Request $request)
    {
        $user = \Auth::user();
        $gen = DB::table('users')->where('id', '=', $user->id)->value('gen');
        //echo $gen;
        return $this->update($gen);
    }
    public function update($param = null){
        $res = DB::table('social_posts')->where('gender', '=', $param)->get();
        $coms = DB::table('commentsTable')->get(); 
        $data =['res'=> $res , 'coms' => $coms , 'gen'=> $param];
        return view('home',compact('data'));
    }
    public function  updateGender(Request $request){
         $gender = $request->gender;
         DB::table('users')->where('remember_token', '=', $request->input('TOKEN'))->update(['gen' => $gender]);
         return $this->update($gender);
         //echo $request;

    }
}
