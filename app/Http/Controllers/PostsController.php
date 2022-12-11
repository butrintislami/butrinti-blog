<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{


public function index()
    {
        return Posts::all();
    }

    public function store(Request $request){
        try{
            $post=new Posts();
            $post->user_id=$request->user_id;
            $post->title= $request->title;
            $post->description= $request->description;

            if($post->save()){
                return response()->json(['status'=>'success','message'=>'Post created successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }

    public function update(Request $request,$id){
        try{
            $post=Posts::findOrfail($id);
//            $post->user_id=$request->user_id;
            $post->title= $request->title;
            $post->description= $request->description;

            if($post->save()){
                return response()->json(['status'=>'success','message'=>'Post updated successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }

    public function destroy($id){
        try{
            $post=Posts::findOrfail($id);
//            $post->user_id=$request->user_id;


            if($post->delete()){
                return response()->json(['status'=>'success','message'=>'Post deleted successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }







}
