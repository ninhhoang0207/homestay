<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Datatables;
use DB;
use Redirect;

class AdminUserController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('user');
    // }
    public function index(){
        $users = \App\User::all();
    	return view('admin.users.index')->with('users',$users);
    }

    public function detail($id){
    	$user = \App\User::where('id',$id)->first();
    	return view('admin.users.detail')->with('user',$user);
    }

    public function edit($id){
        $user = DB::table('users')->where('id',$id)->first();
        $created_date = date_create($user->created_at);
        $created_date = date_format($created_date,'m/d/Y');
        $user->created_at = $created_date;
        return view('admin.users.detail')->with('user',$user);
    }

    public function update(Request $request){
        $data = $request->except('_token','created_at','id');
        $update = DB::table('users')->where('id',$request->id)->update($data);
        return Redirect::route('userManager');
    }

    public function delete($id){
    	$del = DB::table('users')->where('id',$id)->delete();
    	if($del)
    		return Redirect::back()->with('messages','Delete Success');
    	return Redirect::back()->with('errors','Fail to delete');
    }

}
