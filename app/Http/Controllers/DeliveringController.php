<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DeliveringController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivering = DB::table('users')->select('deliver_phone', 'deliver_email')->where('id', '=',
            Auth::User()->id)->get();
        return view('delivering', ['delivering' => $delivering[0]]);
    }

    public function deliveryPhone(Request $request){
        $delivering = DB::table('users')->select('deliver_phone')->where('id', '=',
            Auth::User()->id)->get();
        if($delivering[0]->deliver_phone == 1){
            $deliver = 0;
        } else {
            $deliver = 1;
        }
        $user = User::find(Auth::User()->id);
        if ($user->update(['deliver_phone' => $deliver])){
            return "update";
        }

    }

    public function deliveryEmail(Request $request){
        $delivering = DB::table('users')->select('deliver_email')->where('id', '=',
            Auth::User()->id)->get();
        if($delivering[0]->deliver_email == 1){
            $deliver = 0;
        } else {
            $deliver = 1;
        }
        $user = User::find(Auth::User()->id);
        if ($user->update(['deliver_email' => $deliver])){
            return "update";
        }
    }

}
