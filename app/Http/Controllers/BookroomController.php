<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use DateTime;
use DB;

class BookroomController extends Controller
{
    //
    public function bookroomPost(Request $request){
    	$thoigianden = $this->convertTime($request->thoigianden);
    	$thoigiantra = $this->convertTime($request->thoigiantra);

    	$data = array(
                'nn_id'         =>  $request->nn_id,
    			'ho'			=>	$request->ho,
    			'ten'			=>	$request->ten,
    			'sdt'			=>	$request->sdt,
    			'thoigianden'	=>	$thoigianden,
    			'thoigiantra'	=>	$thoigiantra,
    			'sophong'		=>	$request->sophong,
    			'songuoi'		=>	$request->songuoi,
    			'loaiphong'		=>	$request->loaiphong,
    			'mauudai'		=>	$request->mauudai,
    			'giatien'		=>	$this->totalPrice($request->thoigianden,$request->thoigiantra,$request->loaiphong,60),
                'trangthai'     =>  'choxacnhan',
                'thoigiandangky'=>  date_create(),
    		);

    	DB::table('hoadon')->insert($data);
    }

    protected function convertTime($data){
    	$data = explode(" ", $data);
    	$date = $data[0];
    	$date = str_replace("/", "-", $date);
    	$time = $data[1];
    	$temp =Carbon\Carbon::createFromFormat('d-m-Y H',$date." ".$time);

    	return $temp;
    }

    protected function totalPrice($thoigianden, $thoigiantra, $loaiphong, $id){
    	$id = 60;
    	$thoigian_dinhgia = DB::table('nhanghi_giatien')->where('nn_id',$id)->first();
    	if(isset($thoigian_dinhgia)){
    		$thoigianden_theogio = $thoigian_dinhgia->thoigianden_theogio;
    		$thoigianden_theogio = explode(":", $thoigianden_theogio)[0];
    		$thoigianden_quadem = $thoigian_dinhgia->thoigianden_quadem;
    		$thoigianden_quadem = explode(":", $thoigianden_quadem)[0];
    		$thoigiantra_theogio = $thoigian_dinhgia->thoigiantra_theogio;
    		$thoigiantra_theogio = explode(":", $thoigiantra_theogio)[0];
    		$thoigiantra_quadem = $thoigian_dinhgia->thoigiantra_quadem;
    		$thoigiantra_quadem = explode(":", $thoigiantra_quadem)[0];

    		$loai_thoigiantra_theogio = $thoigian_dinhgia->loai_thoigiantra_theogio;
    		$loai_thoigiantra_quadem = $thoigian_dinhgia->loai_thoigiantra_quadem;
    		$thoigiantra_theogio += 24*$loai_thoigiantra_theogio;
    		$thoigiantra_quadem += 24*$loai_thoigiantra_quadem;

    		$ngayden = explode("/", $thoigianden)[0];
    		$gioden = explode(" ", $thoigianden)[1];

    		$ngaytra = explode("/", $thoigiantra)[0];
    		$giotra = explode(" ", $thoigiantra)[1];
    		$giotra = ($ngaytra - $ngayden)*24 + $giotra;

    		$giatien = DB::table('nhanghi_giatien')
    					->select($loaiphong."_motgio as giodau",$loaiphong."_giotieptheo as giotieptheo",$loaiphong."_quadem as quadem",$loaiphong."_nhieungay as ngay")
    					->where('nn_id',$id)
    					->first();
    		$tongtien = 0;
    		while ($giotra - $gioden > 0) {
    			if($giotra-$gioden >= 24){
					$giotra -= 24;
					$tongtien += $giatien->ngay;
					$gioden = 12;
				}else{
					if($gioden >= $thoigianden_theogio && $giotra <= $thoigiantra_theogio){
						$tongtien += $giatien->giodau;
						$tongtien += $giatien->giotieptheo*($giotra-$gioden-1);
					}else if ($gioden >= $thoigianden_quadem && $giotra <= $thoigiantra_quadem){
						$tongtien += $giatien->quadem;
					}else{
						$tongtien += $giatien->ngay;
					}
					break;
				}
    		}
    		return $tongtien;
    	}
    	return 0;
    }
}
