<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\Post as PostResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function addPost(Request $request){
       
        // return $request->tag;
        $post = new Post;

        $file_data = $request->image;
        $file_name = 'image_'.time().'.png';
        @list($type, $file_data) = explode(';', $file_data);
          @list(, $file_data)      = explode(',', $file_data);
        if($file_data!=""){
            Storage::disk('google')->put($file_name,base64_decode($file_data));
            $url = Storage::disk('google')->url($file_name,base64_decode($file_data));
        }

        $post->image = $url;  
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        if($request->tag != null){
            foreach($request->tag as $key){

                $post = Post::find($post->id);
                $post->pets()->attach($key['id']);

            }
        }

    }

    public function getUserPost($user){
        $post = Post::where('user_id','=',$user)->latest()->get();
        // return $user;
        return PostResource::collection($post);
    }

    public function getAllPost(){
        $post = Post::latest()->get();
        // return $user;
        return PostResource::collection($post);
    }
}
