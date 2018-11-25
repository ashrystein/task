<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CommentsController extends Controller
{
    public function addComment (Request $request , $data){
        $comment = $request->input('comment');
        $data = array(
            array('Ptitle'=> $data,'comment'=> $comment)
        );
        DB::table('commentsTable')->insert($data);
        $res = DB::table('social_posts')->get();
        $coms = DB::table('commentsTable')->get(); 
        $data =['res'=> $res , 'coms' => $coms];
        //echo $data['coms'];
        return view('home',compact('data'));
    }
}
