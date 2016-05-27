<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;
use App;
use Session;
use Config;
use Illuminate\Support\Facades\Input;

class ShopsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('admin');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = App\Shop::all();
        return view('shops', ['shops' => $shops]);
    }

    public function create(Request $request)
    {
        if (isset($request->id) && !empty($request->id)) {
            $shop = App\Shop::find($request->id);
            if (isset($shop)) {
                $shop->name = $request->name;
                $shop->hol_id = $request->hol_id;
                $shop->addres = $request->addres;
                $shop->description = $request->description;
                $shop->save();
            }
        } else {
            App\Shop::create([
                'name' => $request->name,
                'hol_id' => $request->hol_id,
                'addres' => $request->addres,
                'description' => $request->description,
            ]);
        }
        return response()->json('ok');
    }
    

    public function changeShop(Request $request)
    {
        $shop = \Illuminate\Support\Facades\DB::select('select shops.*, holidays.id as hol_id, holidays.name as hol_name from 
                                                            shops as shops LEFT join holidays as holidays ON(holidays.id = shops.hol_id) WHERE  shops.id = ' . $request->id);
        return response()->json($shop[0]);
    }

    public function delete(Request $request)
    {
        $shop = App\Shop::find($request->id);
        if (isset($shop)) {
            $shop->delete();
        }
        return response()->json('delete');
    }


    public function loadHolidays(Request $request)
    {
        $holidays = App\Holiday::all();
        return response()->json($holidays);
    }

    public function getShopByHolidays(Request $request)
    {
        $shops = App\Shop::where('hol_id', '=', $request->id)->get();
        return response()->json($shops);
    }


}
