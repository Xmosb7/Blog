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

    public function EditPostform($post_id, Request $request)
    {
        $post = DB::table('posts')->where('id', $post_id)->get();
        return view('editpost', ['post' => $post[0], 'request' => $request]);
    }
    public function EditPost(Request $request)
    {
        $id = $request->input('Id');
        //if it's admin
        if (auth()->check() && auth()->user()->is_admin == 1) {

            $title = $request->input('Title');
            $description = $request->input('Description');
            $body = $request->input('Body');
            DB::update('update posts set title = ?, description = ?, body = ?, updated_at = ? where id = ?', [$title, $description, $body, date('Y-m-d H:i:s'), $id]);
        }
        //if it's user
        else {
            $Owner = DB::table('posts')->select('user_id')->from('posts')->where('id', $id)->first();
            if (auth()->check() && auth()->user()->id == $Owner->user_id) {
                $title = $request->input('Title');
                $description = $request->input('Description');
                $body = $request->input('Body');
                DB::update('update posts set title = ?, description = ?, body = ?, updated_at = ? where id = ?', [$title, $description, $body, date('Y-m-d H:i:s'), $id]);
            } else {
                return redirect()->back()->withErrors(["You cant edit that post."]);
            }
        }
        return redirect()->route('home');
    }
}
