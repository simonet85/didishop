<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Order;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

     /**
     * Block user .
     *
     * @return a boolean
     */
    public function block($id)
    {
        $users = User::find($id);
        $users->update(['status'=> 1]);
        Session::flash('success', 'User has been blocked.');
        return redirect('admin/users');
        dd($id);
    }

         /**
     * Unblock user .
     *
     * @return a boolean
     */
    public function unblock($id)
    {
        $users = User::find($id);
        $users->update(['status'=> 0]);
        Session::flash('success', 'User has been unblocked.');
        return redirect('admin/users');
        // dd($id);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('user_id',$id)->get();
        return view('admin.users.details')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
