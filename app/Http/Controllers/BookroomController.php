<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use DateTime;
use DB;
use Redirect;
use Lang;

class BookroomController extends Controller
{
    //
    public function index($id=-1) {
        $data = DB::table('nha_nghi')->select('id','ten','diachi')->where('id',$id)->first();
        if (isset($data)) {
            return view('fontend.bookroom')->with('data',$data);
        } else {
            return Redirect::route('home');
        }
    }

    public function make_order(Request $request, $id=-1) {
        $registion_time = date_create();
        $registion_time = date_format($registion_time,'Y-m-d H:i:s');
        $from_time = $this->date_format($request->from_time);
        $to_time = $this->date_format($request->to_time);
        $temp=$this->totalPrice($request->from_time,$request->to_time,$request->room_type,$id);
        $data = array(
            'nn_id'         =>  $id,
            'ho'            =>  $request->last_name,
            'ten'           =>  $request->first_name,
            'sdt'           =>  $request->phone,
            'trangthai'     =>  'choxacnhan',
            'thoigianden'   =>  $from_time,
            'thoigiantra'   =>  $to_time,
            'loaiphong'     =>  $request->room_type,
            'sophong'       =>  $request->room_quantity,
            'songuoi'       =>  $request->guest_quantity,
            'thoigiandangky'=>  $registion_time,
            'giatien'       =>  $this->totalPrice($request->from_time,$request->to_time,$request->room_type,$id)['tongtien'],
        );
        
        DB::table('hoadon')->insert($data);
        return Redirect::route('home');
    }

    public function date_format($date) {
       $temp = str_replace('/', '-', $date);
        $temp = Carbon\Carbon::parse($temp);
       // $temp = date_create($date);
       $temp = date_format($temp,'Y-m-d H:i:s');
       return $temp;
    }

    public function check_new_booking(Request $request) {
        $id = $request->id;
        $now = date_create();
        $now = date_format($now,'Y-m-d H:i:s');
        $status = Lang::get('hotel/general.trangthai');
        
        $data_min_diff = DB::table('hoadon')
        ->selectRaw("*,TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') as min_diff")
        ->where('nn_id',$id)
        ->where('trangthai','like','choxacnhan')
        ->whereRaw("TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') < 15")
        ->orderBy('thoigiandangky')
        ->get()
        ->toArray();
        $count_new_booking = count($data_min_diff);

        $data_overtime_booking = DB::table('hoadon')
        ->where('nn_id',$id)
        ->where('trangthai','choxacnhan')
        ->whereRaw("TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') > 15")
        ->orderBy('thoigiandangky')
        ->get()
        ->toArray();

        foreach ($data_overtime_booking as $key => $value) {
            $value->trangthai = $status['quathoihan'];
        }

        $update = DB::table('hoadon')
        ->where('nn_id',$id)
        ->where('trangthai','choxacnhan')
        ->whereRaw("TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') > 15")
        ->update(['trangthai'=>'quathoihan']);

        return array(
            'new_booking'           =>  $data_min_diff,
            'count_new_booking'     =>  $count_new_booking,
            'overtime_booking'      =>  $data_overtime_booking,
            );
    }

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
    	$thoigian_dinhgia = DB::table('nhanghi_giatien')->where('nn_id',$id)->first();
        $thoigian_sudung = array(
            'gio'       =>  0,
            'dem'       =>  0,
            'ngay'      =>  0,
            );        
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
    		$giotra = explode(":", explode(" ", $thoigiantra)[1])[0];
            $phuttra = explode(":", explode(" ", $thoigiantra)[1])[1];
            $phuttra>0?$giotra++:$giotra;
            $giotra = ($ngaytra - $ngayden)*24 + $giotra;
    		$giatien = DB::table('nhanghi_giatien')
    					->select($loaiphong."_motgio as giodau",$loaiphong."_giotieptheo as giotieptheo",$loaiphong."_quadem as quadem",$loaiphong."_nhieungay as ngay")
    					->where('nn_id',$id)
    					->first();
    		$tongtien = 0;
    		while ($giotra - $gioden > 0) {
    			if($giotra-$gioden >= 24){
                    $thoigian_sudung['ngay']++;
					$giotra -= 24;
					$tongtien += $giatien->ngay;
					$gioden = 12;
				}else{
					if($gioden >= $thoigianden_theogio && $giotra <= $thoigiantra_theogio){
                        $tongtien += $giatien->giodau;
                        $tongtien += $giatien->giotieptheo*($giotra-$gioden-1);
						$thoigian_sudung['gio'] += $giotra-$gioden;
					}else if ($gioden >= $thoigianden_quadem && $giotra <= $thoigiantra_quadem){
                        $thoigian_sudung['dem']++;
						$tongtien += $giatien->quadem;
					}else{
                        $thoigian_sudung['ngay']++;
						$tongtien += $giatien->ngay;
					}
					break;
				}
    		}
    		return array(
                'tongtien'          =>  $tongtien,
                'thoigian_sudung'   =>  $thoigian_sudung,
                );
    	}
    	return 0;
    }

    public function getModalDelete($id = null)
    {
        $confirm_route = route('bookroom.delete', ['id' => $id]);
        return view('includes.modal', compact('confirm_route'));
    }

    public function delete($id=null) {
        $delete = DB::table('hoadon')
        ->where('id',$id)
        ->delete();
        $success = Lang::get('message.success.delete');
        $error = Lang::get('message.error.delete');
        if($delete)
            return Redirect::back()->with('success',$success);
        return Redirect::back()->with('error',$error);
    }
}
