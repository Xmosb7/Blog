<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function welcome()
    {
        $main_posts = DB::table('posts')->get();
        if (request('search')) {
            $main_posts = DB::table('posts')->
                        where('title', 'like', '%' .(request('search') ?? ''). '%' )->
                        orWhere('description', 'like', '%' .(request('search') ?? ''). '%' )->
                        orWhere('body', 'like', '%' .(request('search') ?? ''). '%' )->
                        get();
            return view('search', [
                'main_posts' => $main_posts,
            ]);
        }
        $pinned_posts = $main_posts->where('pinned', 1);
        $no_posts = $main_posts->count() ?? 0;

        return view('welcome', [
            'pinned_posts' => $pinned_posts,
            'main_posts' => $main_posts,
        ]);
    }
}

//search
