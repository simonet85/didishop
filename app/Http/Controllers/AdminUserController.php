<?php

namespace App\Http\Controllers;

use App\AdminUser;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Auth\Session;
// use Session;

class AdminUserController extends Controller
{
    /**
     * Apply authentification for guest users
     */

    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // Validate the user
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

       $credentials = $request->only([
           'email','password'
       ]);

        if (! Auth::guard('admin')->attempt($credentials)) {
            return redirect()->back()->withErrors([
                'message'=>'Oops! Wrong credentials',
            ]);
        }
      
        session()->flash('success', 'Welcome, you logged in successfully.');

        return redirect('/admin');
      
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Logout function 
     * 
     * @return boolean true/false
     */

     public function logout(){
        auth()->guard('admin')->logout();
        session()->flash('success', 'You have been logout');
        return redirect('/admin/login');
     }
}
