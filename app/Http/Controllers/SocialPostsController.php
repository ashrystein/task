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
    $user = \Auth::user();
    $gen = DB::table('users')->where('id', '=', $user->id)->value('gen');
    
    $title = $request->input('title');
    $body = $request->input('body');
    $nID = "123";
    $data = array(
      array('title'=> $title,'body'=> $body, 'national-id'=> $nID , 'gender' => $gen),
    );
    DB::table('social_posts')->insert($data);
    return $this->update($gen);  
  }

  public function update($param = null){
    $res = DB::table('social_posts')->where('gender', '=', $param)->get();
    $coms = DB::table('commentsTable')->get(); 
    $data =['res'=> $res , 'coms' => $coms , 'gen'=> $param];
    return view('home',compact('data'));
  }

  public function delete($data)
  {
   
    DB::table('social_posts')->where('id', '=', $data )->delete();
    
    $user = \Auth::user();
    $gen = DB::table('users')->where('id', '=', $user->id)->value('gen');
    
    return $this->update($gen);  
  }


}
