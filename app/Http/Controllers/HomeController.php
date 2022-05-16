<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $no_users = DB::table('users')->get()->count();
        $no_posts = DB::table('posts')->get()->count();
        $no_visits = DB::table('posts')->sum('visits');
        $user_posts = DB::table('posts')->where('user_id', auth()->user()->id)->get();

        $max_post_visit_value = ($user_posts->max('visits')) ? $user_posts->max('visits') : 0;
        if ($max_post_visit_value > 0) {
            $max_post_visit_post = DB::table('posts')->where('visits', $max_post_visit_value)->first();
            return view('home', [
                'no_users' => $no_users,
                'no_posts' => $no_posts,
                'no_visits' => $no_visits,
                'user_posts' => $user_posts,
                'max_post_visit_post' => $max_post_visit_post,
            ]);
        }
        return view('home', [
            'no_users' => $no_users,
            'no_posts' => $no_posts,
            'no_visits' => $no_visits,
            'user_posts' => $user_posts,
            'max_post_visit_post' => null,
        ]);
    }

    public function welcome()
    {
        $main_posts=DB::table('posts')->get();
        $pinned_posts=$main_posts->where('pinned',1);
        $no_posts=$main_posts->count()??0;

        return view('welcome', [
            'pinned_posts'=>$pinned_posts,
            'main_posts'=>$main_posts,
        ]);
    }
}
