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
        $user_posts = DB::table('posts')->where('user_id', auth()->user()->id)->get(); //user
        $max_post_visit_value = ($user_posts->max('visits')) ? $user_posts->max('visits') : 0; //user
        $max_post_visit_post = ($max_post_visit_value > 0)? DB::table('posts')->where('visits', $max_post_visit_value)->first() :null;

        //if it's admin
        if(auth()->check() && auth()->user()->is_admin == 1){
            $users= DB::table('users')->where('is_admin',0)->get();
            $no_users = $users->count(); //admin
            $no_posts = DB::table('posts')->get()->count(); //admin
            $no_visits = DB::table('posts')->sum('visits'); //admin
            $orders = DB::table('premium_orders')->get(); //admin

            return view('admin.home', [
                'users'=>$users,
                'no_users' => $no_users,
                'no_posts' => $no_posts,
                'no_visits' => $no_visits,
                'user_posts' => $user_posts,
                'max_post_visit_post' => $max_post_visit_post,
                'orders'=>$orders,
            ]);


        }
        //if it's user
        else{

            return view('home', [
                'user_posts' => $user_posts,
                'max_post_visit_post' => $max_post_visit_post,
            ]);

        }

    }
}
