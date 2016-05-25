<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\Time;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;

class ProfileNotesController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $times = DB::select('select * from times where user_id = ' . Auth::User()->id);

        if (!isset($times)) {
            $times = [];
        }

        return view('profile-notes', ['times' => $times]);
    }

    public function delete(Request $request)
    {
        $time = Time::find($request->input('id'));


        if (isset($time)) {
            if ($time->delete()) {

                $timeOrder = $time->order_id;

                $timeCost = $time->cost;

                $order = Order::where('id', '=', $timeOrder)->first();

                $order->total_summ = $order->total_summ - $timeCost;

                $order->save();

                return response()->json("delete");
            }
        } else {
            return response()->json("NoDelete");
        }
    }


    //todo
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            //'password' => 'required|confirmed|min:6',
            'phone' => 'required',
        ]);
    }


}
