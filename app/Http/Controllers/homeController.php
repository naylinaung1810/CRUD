<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function searchPost(Request $request){
        $q=$request['q'];
        $posts=Post::where('id','LIKE',"%$q%")
            ->orWhere('title','LIKE',"%$q%")
            ->orWhere('content','LIKE',"%$q%")
            ->orWhere('created_at','LIKE',"%$q%")->paginate('2');

        return view('welcome')->with(['posts'=>$posts]);


    }

    public function postUpsdate(Request $request)
    {
        $title=$request['title'];
        $content=$request['content'];
        $id=$request['id'];

        $post=Post::whereId($id)->firstOrFail();
        $post->title=$title;
        $post->content=$content;
        $post->update();

        return redirect()->route('/')->with('info','Update successful');
    }

    public function editPost($id)
    {
        $post=Post::whereId($id)->firstOrFail();
        return view('edit')->with(['post'=>$post]);
    }

    public function deletePost($id)
    {
        $post=Post::where('id',$id)->firstOrfail();
        $post->delete();

        return redirect()->back()->with('info','Deleting has been successful');
    }

    public function getWelcome()
    {
        $posts=Post::OrderBy('id','desc')->paginate('2');
        return view('welcome')->with(['posts'=>$posts]);
    }

    public function newPost(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:5|max:15',
            'content'=>'required'
        ]);

        $title=$request['title'];
        $content=$request['content'];
        //dd($title.$content);

        $post=new Post();
        $post->title=$title;
        $post->content=$content;
        $post->save();

        return redirect()->route('/');


    }
}
