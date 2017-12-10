<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class HomestayController extends Controller
{
	// public function index(Request $request)
 //    {

 //        $data = DB::table('nha_nghi')
 //        ->where('nha_nghi.trangthai','like','hoatdong')
 //        ->join('nhanghi_hinhanh','nhanghi_hinhanh.nn_id','=','nha_nghi.id')
 //        ->join('nhanghi_giatien','nhanghi_giatien.nn_id','=','nha_nghi.id')
 //        ->groupBy('nhanghi_giatien.nn_id')
 //        ->paginate(2);

 //        if (isset($data)){
 //            foreach ($data as $key => $value) {
 //                $value->url_hinhanh = str_replace('\\', '', $value->url_hinhanh);
 //            }
 //        }
 //        if ($request->ajax()) {
 //            return ['loadData' =>   view('fontend.ajax.home')->with('data',$data)->render(),
 //            'next_page'=>   $data->nextPageUrl()];
 //        }
 //        return view('homepage.index')->with([
 //            'data'      =>  $data,
 //        ]);
 //        // return view('home');
 //    }

 //    public function homepage() {

    // }

    public function index(Request $request,$coordinate,$range=3){
        if ($request->_token) {
            $coordinate = $request->lat."-".$request->lng;
        } else {
            $coordinate = null;
        }
        $toado = explode("-", $coordinate);

        $data = $this->query($coordinate,$range);
        $ten_dichvu = array(
            1       =>  'Wifi miễn phí',
            2       =>  'Truyền hình cáp',
            3       =>  'Đồ ăn nhanh',
            4       =>  'Gara ô tô',
            5       =>  'Bể bơi miễn phí',
            6       =>  'Thang máy',
            7       =>  'Massage',
            );

        if ($request->ajax()) {
            $firstHour = $request->firstHour;
            $overNight = $request->overNight;
            $days = $request->days;
            $services = $request->services;
            //Find by Checkbox
            if ($firstHour != '' || $overNight != '' || $days != '' || $services != '') {
                $firstHour = explode('-', $firstHour);
                $overNight = explode('-', $overNight);
                $days = explode('-', $days);
                $services = explode('-', $services);
                $data_new = $this->query($coordinate,$range);
                $data = $this->findByCheckBox($data_new,$firstHour,$overNight,$days,$services);
            }
            
            $data = $this->addServices($data);
            return view('ajax.homepage.list_homestays')->with([
                'data'      =>  $data,
                'ten_dichvu'=>  $ten_dichvu,
                'toado'     =>  $toado,
                'data_type' =>  'findByCheckBox',
            ]);
        } else {
            $data = $this->query($coordinate,$range);
            $data_price = $this->findByPrice($coordinate);
            foreach ($data_price as $key => $value) {
                foreach ($value as $k => $v) {
                    $count_data_price[$key][$k] = count($v);
                }
            }
            $data = $this->addServices($data);

            return view('homepage.index2')->with([
                'data'      =>  $data,
                'ten_dichvu'=>  $ten_dichvu,
                'toado'     =>  $toado,
                'kq_timkiem'=>  $count_data_price,
                'data_type' =>  'sortByPopular',
                'ngay'      =>  explode(' ', $request->from_time)[0],
            ]);
        }
    }

    public function search(Request $request) {

    	$first_hour_price = $request->first_hour_price;
    	$over_night_price = $request->over_night_price;
    	$day_price = $request->day_price;
    	$services = $request->services;
    	$lat = $request->lat;
    	$lng = $request->lng;
    	$range = 3;
    	$coordinate = null;
    	if ($lat && $lng)
    		$coordinate = $lat.'-'.$lng;
    	if ($request->radius)
    		$range = explode(',', $request->radius)[1];
    	$ten_dichvu = array(
            1       =>  'Wifi miễn phí',
            2       =>  'Truyền hình cáp',
            3       =>  'Đồ ăn nhanh',
            4       =>  'Gara ô tô',
            5       =>  'Bể bơi miễn phí',
            6       =>  'Thang máy',
            7       =>  'Massage',
            );

    	$data = $this->searching($first_hour_price, $over_night_price, $day_price, $services, $coordinate, $range);
    	$data = $this->addServices($data);
    	dd($data);

		return view('ajax.homepage.list_homestays')->with([
                'data'      =>  $data,
                'ten_dichvu'=>  $ten_dichvu,
            ]);
    }

    public function searching($first_hour_price, $over_night_price, $day_price, $services, $coordinate, $range) {
    	$first_hour_price = explode(',', $first_hour_price);
    	$over_night_price = explode(',', $over_night_price);
    	$day_price = explode(',', $day_price);
    	$data = $this->query($coordinate, $range)->whereBetween('nhanghi_giatien.phongdon_motgio',$first_hour_price)
    								->whereBetween('nhanghi_giatien.phongdoi_motgio',$first_hour_price)
    								->whereBetween('nhanghi_giatien.phongkhac_motgio',$first_hour_price)
    								->whereBetween('nhanghi_giatien.phongdon_quadem',$over_night_price)
    								->whereBetween('nhanghi_giatien.phongdoi_quadem',$over_night_price)
    								->whereBetween('nhanghi_giatien.phongkhac_quadem',$over_night_price)
    								->whereBetween('nhanghi_giatien.phongdon_nhieungay',$day_price)
    								->whereBetween('nhanghi_giatien.phongdoi_nhieungay',$day_price)
    								->whereBetween('nhanghi_giatien.phongkhac_nhieungay',$day_price);
 		$services_string = count($services)?implode('%', $services):'';
    	$data = $data->join('nhanghi_dichvu','nhanghi_dichvu.nn_id','=','nhanghi_giatien.nn_id')
                        ->where('nhanghi_dichvu.dichvu','like','%'.$services_string.'%');
    	return $data;
    }

    public function query($coordinate=null,$range=3) {
        $data = DB::table('nha_nghi');
        if ($coordinate){
            $toado = explode("-", $coordinate);
            $toado_lat = $toado[0];
            $toado_lng = $toado[1];
            $query = "*,round(sqrt(power((ABS(nha_nghi.toado_lat)-".abs($toado_lat)."),2)+power((ABS(nha_nghi.toado_lng)-".abs($toado_lng)."),2))*111,1) as khoangcach";
            $data = $data->selectRaw($query)
                        ->whereRaw("sqrt(power((ABS(nha_nghi.toado_lat)-".abs($toado_lat)."),2)+power((ABS(nha_nghi.toado_lng)-".abs($toado_lng)."),2))*111<".$range);
        }
        
        $data = $data
        ->where('nha_nghi.trangthai','like','hoatdong')
        ->join('nhanghi_hinhanh','nhanghi_hinhanh.nn_id','=','nha_nghi.id')
        ->groupBy('nhanghi_hinhanh.nn_id')
        ->join('nhanghi_giatien','nhanghi_giatien.nn_id','=','nha_nghi.id')
        ->groupBy('nhanghi_giatien.nn_id');
        return $data;
    }

    public function addServices($data) {
        $data = $data->paginate(6);
        foreach ($data as $key => $value) {
            $value->url_hinhanh = str_replace("\\", "", $value->url_hinhanh);
            $dichvu = DB::table('nhanghi_dichvu')->where('nn_id',$value->nn_id)->first();
            $value->dichvu = explode(',', $dichvu->dichvu);
        }
        return $data;
    }

    public function findByPrice($coordinate,$range=3) {
        //Tim kiem theo gia dio dau
        $first_hour['firstHour1'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_motgio', '<', 60)
                    ->orHaving('nhanghi_giatien.phongdoi_motgio', '<', 60)
                    ->orHaving('nhanghi_giatien.phongkhac_motgio', '<', 60)
                    ->get();
        $first_hour['firstHour2'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_motgio','>=',60)
                    ->having('nhanghi_giatien.phongdon_motgio','<',80)
                    ->orHaving('nhanghi_giatien.phongdoi_motgio','>=',60)
                    ->having('nhanghi_giatien.phongdoi_motgio','<',80)
                    ->orHaving('nhanghi_giatien.phongkhac_motgio','>=',60)
                    ->having('nhanghi_giatien.phongkhac_motgio','<',80)
                    ->get();
        $first_hour['firstHour3'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_motgio','>=',80)
                    ->having('nhanghi_giatien.phongdon_motgio','<',100)
                    ->orHaving('nhanghi_giatien.phongdoi_motgio','>=',80)
                    ->having('nhanghi_giatien.phongdoi_motgio','<',100)
                    ->orHaving('nhanghi_giatien.phongkhac_motgio','>=',80)
                    ->having('nhanghi_giatien.phongkhac_motgio','<',100)
                    ->get();
        $first_hour['firstHour4'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_motgio', '>=', 100)
                    ->orHaving('nhanghi_giatien.phongdoi_motgio', '>=', 100)
                    ->orHaving('nhanghi_giatien.phongkhac_motgio', '>=', 100)->get();


        $over_night['overNight1'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_quadem', '<', 60)
                    ->orHaving('nhanghi_giatien.phongdoi_quadem', '<', 60)
                    ->orHaving('nhanghi_giatien.phongkhac_quadem', '<', 60)
                    ->get();
        $over_night['overNight2'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_quadem','>=',60)
                    ->having('nhanghi_giatien.phongdon_quadem','<',80)
                    ->orHaving('nhanghi_giatien.phongdoi_quadem','>=',60)
                    ->having('nhanghi_giatien.phongdoi_quadem','<',80)
                    ->orHaving('nhanghi_giatien.phongkhac_quadem','>=',60)
                    ->having('nhanghi_giatien.phongkhac_quadem','<',80)
                    ->get();
        $over_night['overNight3'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_quadem','>=',80)
                    ->having('nhanghi_giatien.phongdon_quadem','<',100)
                    ->orHaving('nhanghi_giatien.phongdoi_quadem','>=',80)
                    ->having('nhanghi_giatien.phongdoi_quadem','<',100)
                    ->orHaving('nhanghi_giatien.phongkhac_quadem','>=',80)
                    ->having('nhanghi_giatien.phongkhac_quadem','<',100)
                    ->get();
        $over_night['overNight4'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_quadem', '>=', 100)
                    ->orHaving('nhanghi_giatien.phongdoi_quadem', '>=', 100)
                    ->orHaving('nhanghi_giatien.phongkhac_quadem', '>=', 100)->get();

        $days['day1']=$this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_nhieungay', '<', 60)
                    ->orHaving('nhanghi_giatien.phongdoi_nhieungay', '<', 60)
                    ->orHaving('nhanghi_giatien.phongkhac_nhieungay', '<', 60)
                    ->get();
        $days['day2']=$this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_nhieungay','>=',60)
                    ->having('nhanghi_giatien.phongdon_nhieungay','<',80)
                    ->orHaving('nhanghi_giatien.phongdoi_nhieungay','>=',60)
                    ->having('nhanghi_giatien.phongdoi_nhieungay','<',80)
                    ->orHaving('nhanghi_giatien.phongkhac_nhieungay','>=',60)
                    ->having('nhanghi_giatien.phongkhac_nhieungay','<',80)
                    ->get();
        $days['day3']=$this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_nhieungay','>=',80)
                    ->having('nhanghi_giatien.phongdon_nhieungay','<',100)
                    ->orHaving('nhanghi_giatien.phongdoi_nhieungay','>=',80)
                    ->having('nhanghi_giatien.phongdoi_nhieungay','<',100)
                    ->orHaving('nhanghi_giatien.phongkhac_nhieungay','>=',80)
                    ->having('nhanghi_giatien.phongkhac_nhieungay','<',100)
                    ->get();
        $days['day4'] = $this->query($coordinate,$range)->having('nhanghi_giatien.phongdon_nhieungay', '>=', 100)
                    ->orHaving('nhanghi_giatien.phongdoi_nhieungay', '>=', 100)
                    ->orHaving('nhanghi_giatien.phongkhac_nhieungay', '>=', 100)->get();

        $data['firstHour'] = $first_hour;
        $data['overNight'] = $over_night;
        $data['days'] = $days;
        return $data;
    }

    public function findByCheckBox($data,$firstHour,$overNight,$days,$services) {
        $is_first = 0;
        $query = '(';
        if (isset($firstHour)) {
            foreach ($firstHour as $key => $value) {
                switch ($value) {
                    case '1':
                    $query .= '(nhanghi_giatien.phongdon_motgio < 60 OR 
                    nhanghi_giatien.phongdoi_motgio < 60 OR 
                    nhanghi_giatien.phongkhac_motgio < 60) ';
                    $is_first++;
                    break;
                    case '2':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '((nhanghi_giatien.phongdon_motgio >= 60 AND 
                    nhanghi_giatien.phongdon_motgio < 80) OR 
                    (nhanghi_giatien.phongdoi_motgio >= 60 AND 
                    nhanghi_giatien.phongdoi_motgio < 80) OR 
                    (nhanghi_giatien.phongkhac_motgio >= 60 AND 
                    nhanghi_giatien.phongkhac_motgio < 80)) ';
                    $is_first++;
                    break;
                    case '3':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '((nhanghi_giatien.phongdon_motgio >= 80 AND 
                    nhanghi_giatien.phongdon_motgio < 100) OR 
                    (nhanghi_giatien.phongdoi_motgio >= 80 AND 
                    nhanghi_giatien.phongdoi_motgio < 100) OR 
                    (nhanghi_giatien.phongkhac_motgio >= 80 AND 
                    nhanghi_giatien.phongkhac_motgio < 100)) ';
                    $is_first++;
                    break;
                    case '4':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '(nhanghi_giatien.phongdon_motgio > 100 OR 
                    nhanghi_giatien.phongdoi_motgio > 100 OR 
                    nhanghi_giatien.phongkhac_motgio > 100) ';
                    $is_first++;
                    break;
                    default:
                    break;
                }
            }
        }

        if (isset($overNight)) {
            foreach ($overNight as $key => $value) {
                switch ($value) {
                    case '1':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '(nhanghi_giatien.phongdon_quadem < 60 OR 
                    nhanghi_giatien.phongdoi_quadem < 60 OR 
                    nhanghi_giatien.phongkhac_quadem < 60) ';
                    $is_first++;
                    break;
                    case '2':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '((nhanghi_giatien.phongdon_quadem >= 60 AND 
                    nhanghi_giatien.phongdon_quadem < 80) OR 
                    (nhanghi_giatien.phongdoi_quadem >= 60 AND 
                    nhanghi_giatien.phongdoi_quadem < 80) OR 
                    (nhanghi_giatien.phongkhac_quadem >= 60 AND 
                    nhanghi_giatien.phongkhac_quadem < 80)) ';
                    $is_first++;
                    break;
                    case '3':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '((nhanghi_giatien.phongdon_quadem >= 80 AND 
                    nhanghi_giatien.phongdon_quadem < 100) OR 
                    (nhanghi_giatien.phongdoi_quadem >= 80 AND 
                    nhanghi_giatien.phongdoi_quadem < 100) OR 
                    (nhanghi_giatien.phongkhac_quadem >= 80 AND 
                    nhanghi_giatien.phongkhac_quadem < 100)) ';
                    $is_first++;
                    break;
                    case '4':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '(nhanghi_giatien.phongdon_quadem > 100 OR 
                    nhanghi_giatien.phongdoi_quadem > 100 OR 
                    nhanghi_giatien.phongkhac_quadem > 100) ';
                    $is_first++;
                    break;
                    default:
                    break;
                }
            }
        }
        if (isset($days)) {
            foreach ($days as $key => $value) {
                switch ($value) {
                    case '1':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '(nhanghi_giatien.phongdon_nhieungay < 60 OR 
                    nhanghi_giatien.phongdoi_nhieungay < 60 OR 
                    nhanghi_giatien.phongkhac_nhieungay < 60) ';
                    $is_first++;
                    break;
                    case '2':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '((nhanghi_giatien.phongdon_nhieungay >= 60 AND 
                    nhanghi_giatien.phongdon_nhieungay < 80) OR 
                    (nhanghi_giatien.phongdoi_nhieungay >= 60 AND 
                    nhanghi_giatien.phongdoi_nhieungay < 80) OR 
                    (nhanghi_giatien.phongkhac_nhieungay >= 60 AND 
                    nhanghi_giatien.phongkhac_nhieungay < 80)) ';
                    $is_first++;
                    break;
                    case '3':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '((nhanghi_giatien.phongdon_nhieungay >= 80 AND 
                    nhanghi_giatien.phongdon_nhieungay < 100) OR 
                    (nhanghi_giatien.phongdoi_nhieungay >= 80 AND 
                    nhanghi_giatien.phongdoi_nhieungay < 100) OR 
                    (nhanghi_giatien.phongkhac_nhieungay >= 80 AND 
                    nhanghi_giatien.phongkhac_nhieungay < 100)) ';
                    $is_first++;
                    break;
                    case '4':
                    $query .= $is_first!=0?'OR ':' ';
                    $query .= '(nhanghi_giatien.phongdon_nhieungay > 100 OR 
                    nhanghi_giatien.phongdoi_nhieungay > 100 OR 
                    nhanghi_giatien.phongkhac_nhieungay > 100) ';
                    $is_first++;
                    break;
                    default:
                    break;
                }
            }
        }
        $query.=')';
        if ($query != '()') {
            $data = $data->whereRaw($query);
        }
        if ($services[0] != '') {
            $services_string = '';
            foreach ($services as $key => $value) {
                $services_string .= $value;
                $services_string .= '%';
            }
            $services_string = substr($services_string, 0,strlen($services_string)-1);
            $data = $data->join('nhanghi_dichvu','nhanghi_dichvu.nn_id','=','nhanghi_giatien.nn_id')
                        ->where('nhanghi_dichvu.dichvu','like','%'.$services_string.'%');
        }
        return $data;
    }
}
