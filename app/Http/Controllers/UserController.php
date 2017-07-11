<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Lang;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{
    //
    public function bookroom_history() {
    	$id = Auth::user()->id;
    	$loaiphong = Lang::get('hotel/general.kieuphong');
    	return view('fontend.user.bookroom_history')->with('loaiphong',$loaiphong);
    }

    public function getDataFromBookroomHistory($id=-1) {
    	$id = Auth::user()->id;
    	return DataTables::of(DB::table('hoadon')
    	    	->where('hoadon.nguoidung_id',$id)
    	    	->join('nha_nghi','nha_nghi.id','hoadon.nn_id')
    	    	->select('nha_nghi.ten','thoigiandangky','thoigiansudung','loaiphong','giatien'))
    			->make(true);
    }
}
