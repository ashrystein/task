<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CommentsController extends Controller
{
    public function addComment (Request $request){
        $comment = $_GET['c'];
        $ptitle = $_GET['p'];
        
        $data = array(
            array('Ptitle'=> $ptitle,'comment'=> $comment)
        );
        if($comment !== "" && $ptitle!=""){
            DB::table('commentsTable')->insert($data);
        }
        return response()->json(array('p'=>$ptitle , 'c' =>$comment), 200);
    }
}
