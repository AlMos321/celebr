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

class EmployeController extends Controller
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
        $employes = App\Employe::all();
        return view('employe', ['employes' => $employes]);
    }

    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)){
            $empl = App\Employe::find($request->id);
            if(isset($empl)){
                $empl-> name = $request->name;
                $empl-> type_id = $request->type_id;
                $empl-> email = $request->email;
                $empl-> phone = $request->phone;
                $empl-> salary = $request->salary;
                $empl->save();
            }
        } else {
            App\Employe::create([
                'name' => $request->name,
                'type_id' => $request->type_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'salary' => $request->salary,
            ]);
        }
        return response()->json('ok');
    }
    
    public function getCategories(){
        $categories = App\Category::all();
        return response()->json($categories);
    }

    public function changeEmploye(Request $request){
        $employe = \Illuminate\Support\Facades\DB::select('select empl.*, cat.id as cat_id, cat.name as cat_name from 
                                                            employes as empl LEFT join categorys as cat ON(empl.type_id = cat.id) WHERE  empl.id = '.$request->id);
        return response()->json($employe[0]);
    }
    
    public function delete(Request $request)
    {
        $empl = App\Employe::find($request->id);
        if(isset($empl)){
            $empl->delete();
        }
        return response()->json('delete');
    }
    

}
