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
        
        return view('post', ['post'=>$post[0], 'comments'=>$comments]);
    }

    
}
