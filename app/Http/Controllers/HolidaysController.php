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

class HolidaysController extends Controller
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
        $holidays = App\Holiday::all();
        return view('holidays', ['holidays' => $holidays]);
    }

    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)){
            $empl = App\Holiday::find($request->id);
            if(isset($empl)){
                $empl->name = $request->name;
                $empl->cost = $request->cost;
                $empl->description = $request->description;
                $empl->options = $request->options;
                $empl->save();
            }
        } else {
            App\Holiday::create([
                'name' => $request->name,
                'cost' => $request->cost,
                'description' => $request->description,
                'options' => $request->options,
            ]);
        }
        return response()->json('ok');
    }

    /*public function getCategories(){
        $categories = App\Category::all();
        return response()->json($categories);
    }

    public function changeEmploye(Request $request){
        $employe = \Illuminate\Support\Facades\DB::select('select empl.*, cat.id as cat_id, cat.name as cat_name from 
                                                            employes as empl LEFT join categorys as cat ON(empl.type_id = cat.id) WHERE  empl.id = '.$request->id);
        return response()->json($employe[0]);
    }*/

    public function changeHolidays(Request $request)
    {
        $holiday = App\Holiday::find($request->id);
        return response()->json($holiday);
    }


}
