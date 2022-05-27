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

    public function WritePost(Request $request)
    {
        if (auth()->check() && auth()->user()->plan_id == 1) {
            return redirect()->back()->withErrors(["You cant Write a post."]);
        } else {
            return view('write', ['request' => $request]);
        }
    }
    public function AddPost(Request $request)
    {
        //if it's admin
        if (auth()->check() && auth()->user()->is_admin == 1) {

            $title = $request->input('Title');
            $description = $request->input('Description');
            $body = $request->input('Body');
            $user = auth()->user()->id;
            DB::insert('insert into posts (title, description, body, visits,pinned,user_id, created_at) values (?, ?, ?, ?, ?,?,?)', [$title, $description, $body, 0, 0, $user, date('Y-m-d H:i:s')]);
        }
        // if it user 
        else {
            $postcounter = DB::table('posts')->where('user_id', auth()->user()->id)->count();
            // if it have 2 posts so it cant
            if ($postcounter < 2) {
                $title = $request->input('Title');
                $description = $request->input('Description');
                $body = $request->input('Body');
                $user = auth()->user()->id;
                DB::insert('insert into posts (title, description, body, visits,pinned,user_id, created_at) values (?, ?, ?, ?, ?,?,?)', [$title, $description, $body, 0, 0, $user, date('Y-m-d H:i:s')]);
            } else {
                return redirect()->back()->withErrors(["You Have You limit Posts."]);
            }
        }
        return redirect()->route('home');
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

    public function DeleteComment($post_id)
    {
          //if it's admin
          if (auth()->check() && auth()->user()->is_admin == 1) {
            DB::table('comments')->delete($post_id);
        }
        //if it's user
        else {
            $Owner = DB::table('comments')->select('user_id')->from('comments')->where('id', $post_id)->first();
            if (auth()->check() && auth()->user()->id == $Owner->user_id) {
                DB::table('comments')
                    ->delete($post_id);
            } else {
                return redirect()->back()->withErrors(["You cant delete that commment."]);
            }
        }
        return redirect()->back();      
    }

    public function EditPostform($post_id, Request $request)
    {
        $post = DB::table('posts')->where('id', $post_id)->get();
        $Owner = DB::table('posts')->select('user_id')->from('posts')->where('id', $post_id)->first();

        if ((auth()->check() && auth()->user()->is_admin == 1) || (auth()->check() && auth()->user()->id == $Owner->user_id)) {
            return view('editpost', ['post' => $post[0], 'request' => $request]);
        } else {
            return redirect()->back()->withErrors(["You cant edit that post."]);
        }
    }
    public function EditPost(Request $request)
    {
        $id = $request->input('Id');
        $title = $request->input('Title');
        $description = $request->input('Description');
        $body = $request->input('Body');
        DB::update('update posts set title = ?, description = ?, body = ?, updated_at = ? where id = ?', [$title, $description, $body, date('Y-m-d H:i:s'), $id]);
        return redirect()->route('home');
    }
}
