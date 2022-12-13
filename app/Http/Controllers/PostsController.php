<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
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
            $post->user_id=auth()->id();
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
            $uid=auth()->id();
            $post=Posts::findOrfail($id);
            $post->title= $request->title;
            $post->description= $request->description;

            if($post->user_id==$uid){
                $post->save();
                return response()->json(['status'=>'success','message'=>'Post updated successfully']);
            }else{
                return response()->json(['status'=>'fail','message'=>'You do not have access to edit this post']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }

    public function destroy($id){
        try{
            $uid=auth()->id();
            $post=Posts::findOrfail($id);
            $user=User::findOrfail($uid);


                       if ($post->user_id==auth()->id() OR $user->role=='admin'){
                           $post->delete();
                           return response()->json(['status'=>'success','message'=>'Post deleted successfully']);

                       }else{
                           return response()->json(['status'=>'fail','message'=>'You do not have access to delete this post']);

                       }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }







}
