<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function approve($order_id)
    {
        DB::transaction(function () use($order_id){
            DB::table('premium_orders')
                ->where('id', $order_id)
                ->update(['status' => 'Approved']);
            DB::table('users')
                ->where('id',request('user') )
                ->update(['plan_id' => 2]);
        });
        return redirect()->route('home');

    }

    public function cancel($order_id)
    {
        DB::table('premium_orders')
            ->where('id', $order_id)
            ->update(['status' => 'Canceled']);
        return redirect()->route('home');
    }
    public function delete($order_id)
    {
        DB::table('premium_orders')
            ->delete($order_id);
        return redirect()->route('home');
    }

    public function user_delete($user_id)
    {
        DB::table('users')
            ->delete($user_id);
        return redirect()->route('home');
    }



}
