<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DetailController extends Controller
{
    public function detail(Request $request) {
		$hotel_id = $request->hotel_id;
		$data = DB::table('nha_nghi')
		->where('nha_nghi.id',$hotel_id)
		->join('nhanghi_giatien','nhanghi_giatien.nn_id','=','nha_nghi.id')
		->join('nhanghi_dichvu','nhanghi_dichvu.nn_id','=','nha_nghi.id')
		->first();
		$data->dichvu = explode(',', $data->dichvu);
		$imgs = DB::table('nhanghi_hinhanh')->where('nn_id',$hotel_id)->get();
		foreach ($imgs as $key => $value) {
			$value->url_hinhanh = str_replace('\\', '', $value->url_hinhanh);
		}
		$ten_dichvu = array(
			1		=>	'Wifi',
			2		=>	'Truyền hình cáp',
			3		=>	'Đồ ăn nhanh',
			4		=>	'Gara ô tô',
			5		=>	'Bể bơi',
			6		=>	'Thang máy',
			7		=>	'Massage',
			);
		DB::table('nha_nghi')->where('id',$hotel_id)->update(['luot_xem' => $data->luot_xem+1]);

		return view('homepage.detail')->with([
			'data'		=>	$data,
			'imgs'		=>	$imgs,
			'ten_dichvu'=>	$ten_dichvu,
			]);
	}
}
