<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SocialPostsController extends Controller
{
      /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
  public function redirect(Request $request)
  {
    //echo $request;
    $title = $request->input('title');
    $body = $request->input('body');
    $nID = "123";
    $data = array(
      array('title'=> $title,'body'=> $body, 'national-id'=> $nID),
  );
  DB::table('social_posts')->insert($data);
  
  $res = DB::table('social_posts')->get();
    $coms = DB::table('commentsTable')->get(); 
    $data =['res'=> $res , 'coms' => $coms];
    //echo $data['coms'];
    return view('home',compact('data'));  
  }

  public function delete($data)
  {
   
    DB::table('social_posts')->where('id', '=', $data )->delete();
    //echo $data;
    $res = DB::table('social_posts')->get();
    $coms = DB::table('commentsTable')->get(); 
    $data =['res'=> $res , 'coms' => $coms];
    //echo $data['coms'];
    return view('home',compact('data'));  
  }


}
