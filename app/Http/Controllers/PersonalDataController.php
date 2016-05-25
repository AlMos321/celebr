<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class PersonalDataController extends Controller
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
        $user = DB::table('users')->select('name', 'surname', 'email', 'phone')->where('id', '=',
            Auth::User()->id)->get();
        if (!isset($user[0])) {
            $user = [];
        }
        return view('personal-data', ['user' => $user[0]]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $updateVal = array();
        $validateVal = array();

        if (
        Hash::check($request['old-pass'], Auth::User()->password)) {
            if ($request->input('new-pass') == $request->input('new-re-pass')) {
                $updateVal['password'] = bcrypt($request['new-pass']);
                $validateVal['new-pass'] = 'required|min:6|max:10';
            }
        } else {
            if(!empty($request['old-pass'])){
                $validationPass = 'Password wrong';
            }
        }

        if (!empty($request->input('new-pass'))){
            $validateVal['new-pass'] = 'required|min:6|max:10';
            $validateVal['new-re-pass'] = 'required|min:6|max:10|same:new-pass';
        }


        if (Auth::User()->email != $request['email']) {
            $updateVal['email'] = $request['email'];
            $validateVal['email'] = 'required|email|max:255|unique:users';
        }

        $updateVal['name'] = $request['name'];
        $validateVal['name'] = 'required|max:50';

        $updateVal['phone'] = $request['phone'];

        $validateVal['phone'] = 'required|max:50|phone:AUTO,UA';

        $updateVal['surname'] = $request['surname'];
        $validateVal['surname'] = 'max:50';


        $validator = Validator::make($request->all(), $validateVal);

        if ($validator->fails() || isset($validationPass)) {
            if (isset($validationPass)){
                $validator->getMessageBag()->add('old-pass', $validationPass);
            }
            $errors = $validator->errors();

            //return redirect()->back()->withErrors($errors);
            return $errors;
            //return $errors;
        }

        $user = User::find(Auth::User()->id);

        $user->update($updateVal);

        return redirect()->back()->with('message', 'update');
        //return response()->json('update');
    }

}
