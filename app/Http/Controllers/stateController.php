<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\state;
Use App\Models\registration_model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $state=state::get();
        return view('state',['states'=>$state]);
    }
    // index or homepage or userpage .................
    public function homepage()
{
    // Check if the user is logged in and has the required user type (User)
    if (session()->has('id') && session()->has('utype') && session()->get('utype') === 'User') {
        return view('homepage');
    } else {
        return redirect()->route('login')->with('error', 'You do not have permission to access the homepage.');
    }
}
    // admin page ..................
    public function dashbord()
{
    if (session()->has('id') && session()->has('utype') && session()->get('utype') === 'Admin') {
        return view('index');
    } else {
        return redirect()->route('login')->with('error', 'You do not have permission to access the dashboard.');
    }
}
    // login .....................
    public function login()
{
    if (session()->has('id') && session()->has('utype')) {
        if (session()->get('utype') === 'Admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('homepage');
        }
    }
    return view('login');
}
    public function postLogin(Request $request)
    {
        $user = registration_model::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
        if ($user) {
            session()->put('id',$user->id);
            session()->put('utype',$user->utype);
            if ($user->utype == 'Admin') {
                // Redirect to admin page
                return redirect()->route('dashboard');
            } else {
                // Redirect to user page
                return redirect()->route('homepage');
            }
        } else {
            return redirect()->route('login');
        }
    }
    // logout ....................
    public function logout(){
        session()->forget('id');
        session()->forget('type');
        return redirect()->route('login');
    }
    // registration ...............
    public function registration(){
        return view('register');
    }
    public function registrationHangle(Request $request){
        $result=new registration_model();
        $result->fname=$request->fname;
        $result->lname=$request->lname;
        $result->email=$request->email;
        $result->password=$request->password;
        $result->cpassword=$request->cpassword;
        $result->utype=$request->utype;
        $result->save();
        // return view('homepage');
        return redirect()->route('homepage');
        

        
    }
    public function forget(){
        return view('password');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
