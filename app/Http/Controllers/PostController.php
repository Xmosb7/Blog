<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use mysql_xdevapi\Exception;

class PostController extends Controller
{
    public function show($post_id)
    {
        $post = DB::table('posts')->where('id', $post_id)->get();
        $comments = DB::table('comments')->where('post_id', $post_id)->get();
        return view('post', ['post' => $post[0], 'comments' => $comments]);
    }

    public function DeletePost($post_id)
    {
        //if it's admin
        if (auth()->check() && auth()->user()->is_admin == 1) {
            DB::table('posts')
                ->delete($post_id);
        }
        //if it's user
        else {
            $Owner = DB::table('posts')->select('user_id')->from('posts')->where('id', $post_id)->first();
            if (auth()->check() && auth()->user()->id == $Owner->user_id) {
                DB::table('posts')
                    ->delete($post_id);
            } else {
                return redirect()->back()->withErrors(["You cant delete that post."]);
            }
        }
        return redirect()->route('home');
    }
}
