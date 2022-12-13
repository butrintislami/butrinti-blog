<?php

namespace App\Http\Controllers;

use App\Models\Replies;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function store(Request $request,$id){
        try{
            $reply=new Replies();
            $reply->user_id=auth()->id();
            $reply->post_id= $id;
            $reply->comment= $request->comment;

            if($reply->save()){
                return response()->json(['status'=>'success','message'=>'Comment created successfully']);
            }else{
                return response()->json(['status'=>'Fail','message'=>'Comment creation Failed']);

            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }
}
