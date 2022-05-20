<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class premium extends Controller
{
    public function request()
    {
        if(auth()->check() && auth()->user()->is_admin == 0){
            DB::insert('insert into premium_orders (status, user_id,created_at,updated_at) values ("waiting the approval", ?,Now(),Now())', [auth()->user()->id]);
        }
        return redirect()->route('home');
    }
}
