<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use Lang;
use Session;
use File;

class HotelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = DB::table('nha_nghi')->get();
    	return view('admin.hotels.index',compact('data'));
    }

    public function register(){
        $services = DB::table('dichvu')->get();
        return view('admin.hotels.register',compact('services'));
    }

    public function create(Request $request){
        $end_date = $request->end_date;
        $end_date = date_create($end_date);
        $end_date = date_format($end_date,'Y/m/d');
        $data = array(
            'ten'                   =>  $request->name,
            'diachi'                =>  $request->address,
            'toado_lat'             =>  $request->lat,
            'toado_lng'             =>  $request->lng,
            'email'                 =>  $request->email,
            'sdt'                   =>  $request->phone,
            'so_phongdon'           =>  $request->singleroom_number,
            'so_phongdoi'           =>  $request->doubleroom_number,
            'so_phongkhac'          =>  $request->otherroom_number,
            'dientich_phongdon'     =>  $request->singleroom_square,
            'dientich_phongdoi'     =>  $request->doubleroom_square,
            'dientich_phongkhac'    =>  $request->otherroom_square,
            'sotang'                =>  $request->floor_numb,
            'mota'                  =>  $request->description,
            'ghichu'                =>  $request->note,
            'thoigian_dk'           =>  date("Y/m/d"),
            'thoihan_dk'            =>  $end_date,
            'nguoi_dk_id'           =>  Auth::getUser()->id,
            );
        $insert = DB::table('nha_nghi')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        //Services
        $services = $request->services;
        $services_string = '';
        foreach ($services as $key => $value) {
            $services_string .= ($value.',');
            // DB::table('nhanghi_dichvu')->insert([
            //         'nn_id' =>  $id,
            //         'dichvu_id' => $value,
            //     ]);
        }
        $services_string = substr($services_string, 0,strlen($services_string)-1);
        if ($services_string != '') {
            DB::table('nhanghi_dichvu')
            ->where('nn_id',$id)
            ->insert(array(
                'nn_id'=>$id,
                'dichvu_id'=>$id,
                'dichvu'=>$services_string,
                ));
        }
        //Bang gia
        $singleroom_price = $request->singleroom_price;
        $doubleroom_price = $request->doubleroom_price;
        $otherroom_price = $request->otherroom_price;
        $thoigianden_theogio = $request->fromtime_hour;
        $thoigianden_quadem = $request->fromtime_night;
        $thoigiantra_theogio = $request->totime_hour;
        $thoigiantra_quadem = $request->totime_night;
        $loai_thoigiantra_theogio = $request->hour;
        $loai_thoigiantra_quadem = $request->overnight;

        $price = array(
            'nn_id'                     =>  $id,
            'phongdon_motgio'           =>  $singleroom_price[0],
            'phongdon_giotieptheo'      =>  $singleroom_price[1],
            'phongdon_quadem'           =>  $singleroom_price[2],
            'phongdon_nhieungay'        =>  $singleroom_price[3],

            'phongdoi_motgio'           =>  $doubleroom_price[0],
            'phongdoi_giotieptheo'       =>  $doubleroom_price[1],
            'phongdoi_quadem'           =>  $doubleroom_price[2],
            'phongdoi_nhieungay'        =>  $doubleroom_price[3],

            'phongkhac_motgio'          =>  $otherroom_price[0],
            'phongkhac_giotieptheo'     =>  $otherroom_price[1],
            'phongkhac_quadem'          =>  $otherroom_price[2],
            'phongkhac_nhieungay'       =>  $otherroom_price[3],

            'thoigianden_theogio'       =>  $thoigianden_theogio,
            'thoigianden_quadem'        =>  $thoigianden_quadem,
            'thoigiantra_theogio'       =>  $thoigiantra_theogio,
            'thoigiantra_quadem'        =>  $thoigiantra_quadem,

            'loai_thoigiantra_theogio'  =>  $loai_thoigiantra_theogio,
            'loai_thoigiantra_quadem'   =>  $loai_thoigiantra_quadem,
            );
        DB::table('nhanghi_giatien')->insert($price);
        $success = Lang::get('message.success.create');
        $error = Lang::get('message.error.create');
        //Luu anh
        $hotel_images = $request->img_hotel_info;
        $singleroom_images = $request->img_singleroom_info;
        $doubleroom_images = $request->img_doubleroom_info;
        $otherroom_images = $request->img_otherroom_info;
        $_token = $request->_token;
        $this->doUploadImg($id,$hotel_images,$_token,0);
        $this->doUploadImg($id,$singleroom_images,$_token,1);
        $this->doUploadImg($id,$doubleroom_images,$_token,2);
        $this->doUploadImg($id,$otherroom_images,$_token,3);
        if($insert)
            return Redirect::route('hotel')->with('success',$success);
        return
            Redirect::back()->with('error',$error);
    }
    
    public function edit($id)
    {
        $data = DB::table('nha_nghi')->where('id',$id)->first();
        $thoihan_dk = $data->thoihan_dk;
        $thoihan_dk = date_create($thoihan_dk);
        $thoihan_dk = date_format($thoihan_dk,'m/d/Y');
        $data->thoihan_dk = $thoihan_dk;

        $hotel_price = DB::table('nhanghi_giatien')->where('nn_id',$id)->first();
        $hotel_price->thoigianden_theogio = substr($hotel_price->thoigianden_theogio, 0,-3);
        $hotel_price->thoigianden_quadem = substr($hotel_price->thoigianden_quadem, 0,-3);
        $hotel_price->thoigiantra_theogio = substr($hotel_price->thoigiantra_theogio, 0,-3);
        $hotel_price->thoigiantra_quadem = substr($hotel_price->thoigiantra_quadem, 0,-3);
        //Get and set service checked
        $services = DB::table('dichvu')->get();
        $hotel_services = DB::table('nhanghi_dichvu')->where('nn_id',$id)->get();
        if (isset($services)) {
            $servicesdata = explode(',', $hotel_services[0]->dichvu);
            // foreach ($services as $key => $value) {
            //     $services[$key]->checked = "";
            //     foreach ($hotel_services as $key1 => $value1) {
            //         if($services[$key]->id == $value1->dichvu_id )
            //             $services[$key]->checked = "checked";
            //     }
            // }
            foreach ($services as $key => $value) {
                $services[$key]->checked = "";
                foreach ($servicesdata as $key1 => $value1) {
                    if($services[$key]->id == $value1)
                        $services[$key]->checked = "checked";
                }
            }
        }
        return view('admin.hotels.edit',compact(['data','hotel_price','services']));
    }

    public function update(Request $request){
        $id = $request->id;
        $end_date = $request->end_date;
        $end_date = date_create($end_date);
        $end_date = date_format($end_date,'Y/m/d');
        $status = isset($request->status)?$request->status:"khonghoatdong";
        $data = array(
            'ten'                   =>  $request->name,
            'diachi'                =>  $request->address,
            'toado_lat'             =>  $request->lat,
            'toado_lng'             =>  $request->lng,
            'email'                 =>  $request->email,
            'sdt'                   =>  $request->phone,
            'so_phongdon'           =>  $request->singleroom_number,
            'so_phongdoi'           =>  $request->doubleroom_number,
            'so_phongkhac'          =>  $request->otherroom_number,
            'dientich_phongdon'     =>  $request->singleroom_square,
            'dientich_phongdoi'     =>  $request->doubleroom_square,
            'dientich_phongkhac'    =>  $request->otherroom_square,
            'sotang'                =>  $request->floor_numb,
            'mota'                  =>  $request->description,
            'ghichu'                =>  $request->note,
            'thoihan_dk'            =>  $end_date,
            'trangthai'             =>  $status,
            );
       
        $update = DB::table('nha_nghi')->where('id',$id)->update($data);
        //Services
        $services = $request->services;
        $services_string = '';
        foreach ($services as $key => $value) {
            $services_string .= ($value.',');
        }
        $services_string = substr($services_string, 0,strlen($services_string)-1);
        DB::table('nhanghi_dichvu')
        ->where('nn_id',$id)
        ->update(array('dichvu_id'=>0,
                        'dichvu'=>$services_string));
         //Bang gia
        $singleroom_price = $request->singleroom_price;
        $doubleroom_price = $request->doubleroom_price;
        $otherroom_price = $request->otherroom_price;
        $thoigianden_theogio = $request->fromtime_hour;
        $thoigianden_quadem = $request->fromtime_night;
        $thoigiantra_theogio = $request->totime_hour;
        $thoigiantra_quadem = $request->totime_night;
        $loai_thoigiantra_theogio = $request->hour;
        $loai_thoigiantra_quadem = $request->overnight;
        $price = array(
            'phongdon_motgio'   =>  $singleroom_price[0],
            'phongdon_giotieptheo' =>  $singleroom_price[1],
            'phongdon_quadem'   =>  $singleroom_price[2],
            'phongdon_nhieungay'=>  $singleroom_price[3],

            'phongdoi_motgio'   =>  $doubleroom_price[0],
            'phongdoi_giotieptheo' =>  $doubleroom_price[1],
            'phongdoi_quadem'   =>  $doubleroom_price[2],
            'phongdoi_nhieungay'=>  $doubleroom_price[3],

            'phongkhac_motgio'  =>  $otherroom_price[0],
            'phongkhac_giotieptheo'=>  $otherroom_price[1],
            'phongkhac_quadem'  =>  $otherroom_price[2],
            'phongkhac_nhieungay'=>  $otherroom_price[3],

            'thoigianden_theogio'       =>  $thoigianden_theogio,
            'thoigianden_quadem'        =>  $thoigianden_quadem,
            'thoigiantra_theogio'       =>  $thoigiantra_theogio,
            'thoigiantra_quadem'        =>  $thoigiantra_quadem,

            'loai_thoigiantra_theogio'  =>  $loai_thoigiantra_theogio,
            'loai_thoigiantra_quadem'   =>  $loai_thoigiantra_quadem,
            );
        DB::table('nhanghi_giatien')->where('nn_id',$id)->update($price);
        //Save images
        $hotel_images = $request->img_hotel_info;
        $singleroom_images = $request->img_singleroom_info;
        $doubleroom_images = $request->img_doubleroom_info;
        $otherroom_images = $request->img_otherroom_info;
        $_token = $request->_token;
        $this->doUploadImg($id,$hotel_images,$_token,0);
        $this->doUploadImg($id,$singleroom_images,$_token,1);
        $this->doUploadImg($id,$doubleroom_images,$_token,2);
        $this->doUploadImg($id,$otherroom_images,$_token,3);
        $success = Lang::get('message.success.update');
        // $error = Lang::get('message.error.update');
        return Redirect::route('hotel')->with('success',$success);
    }

    public function doUploadImg($id,$data_img=null,$_token,$type){
        //Khoi tao thu muc
        $temp_folder = 'stores/temp/'.$_token.'/'.$type.'/';
        $real_folder = 'stores/img_hotel/'.$id.'/'.$type.'/';

        if (!is_dir($real_folder)) {
            File::makeDirectory('stores/img_hotel/'.$id.'/'.$type,0777,true);
        }
        //Luu anh vao serve
        if($data_img != null){
            foreach ($data_img as $key => $value) {
                if($value != ""){
                    $temp = explode(",", $value);
                    $temp_id = $temp[0];
                    $temp_fileName = $temp[1];
                    if ($temp_fileName != "undefined") {
                        if($temp_id == 0){
                            File::move($temp_folder.$temp_fileName,$real_folder.$temp_fileName);
                            DB::table('nhanghi_hinhanh')->insert([
                                'nn_id'         =>  $id,
                                'url_hinhanh'   =>  $real_folder."\\".$temp_fileName,
                                ]);
                        }else{
                            File::delete($real_folder.$temp_fileName);
                            DB::table('nhanghi_hinhanh')->where('url_hinhanh',$real_folder."\\".$temp_fileName)->delete();
                        }
                    }
                }
            }
            //Xoa sau khi da thuc hien xong
            File::deleteDirectory($temp_folder);
        }
    }

    public function getModalDelete($id = null)
    {
        $confirm_route = $error = null;
        $confirm_route = route('hotel.delete', ['id' => $id]);
        return view('includes.modal', compact('confirm_route'));
    }

    public function delete($id){
        $delete_hotel = DB::table('nha_nghi')->where('id',$id)->delete();
        $delete_hotel_images = DB::table('nhanghi_hinhanh')->where('nn_id',$id)->delete();
        $delete_hotel_services = DB::table('nhanghi_dichvu')->where('nn_id',$id)->delete();
        $delete_hotel_price = DB::table('nhanghi_giatien')->where('nn_id',$id)->delete();
        $real_folder = 'stores/img_hotel/'.$id.'/';
        if (is_dir($real_folder)) {
            File::deleteDirectory($real_folder);
        }
        $success = Lang::get('message.success.delete');
        $error = Lang::get('message.error.delete');
        if($delete_hotel)
            return Redirect::back()->with('success',$success);
        return Redirect::back()->with('error',$error);
    }
    
    //Upload phan create new
    public function uploadImg(Request $request){
        //Khoi tao 
        $id = $request->id;
        $type = $request->type;
        $temp_folder = 'stores/temp/'.$request->_token.'/'.$type.'/';

        $file = $request->file;
        $new_name = rand(1,1000).time();
        $ext = $file->getClientOriginalExtension();
        $file->move($temp_folder,$new_name.'.'.$ext);

        return $new_name.'.'.$ext;

    }

    public function deleteImg(Request $request){
        $id = $request->id;
        $type = $request->type;
        $name = $request->name;
        $temp_folder = 'stores/temp/'.$request->_token.'/'.$type.'/';
        $real_folder = 'stores/img_hotel/'.$id.'/'.$type.'/'.'\\';
        $data = DB::table('nhanghi_hinhanh')->where('url_hinhanh',$real_folder.$name)->get();
        if(count($data) != 0){
            return 1;
        }
        return -1;
    }

    public function getImgs(Request $request){
        $id = $request->id;
        $type = $request->type;
        $real_folder = 'stores/img_hotel/'.$id.'/'.$type.'\\'.'/';
        $data = DB::table('nhanghi_hinhanh')
                        ->where('nn_id',$id)
                        ->where('url_hinhanh','LIKE', $real_folder.'%')
                        ->get();
        return $data;
    }

    // Danh sach hoa don dat phong
    public function bookroomList($id){
        $now = date_create();
        $now = date_format($now,'Y-m-d H:i:s');
        $data_new_booking = DB::table('hoadon')
        ->selectRaw("*,TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') as min_diff")
        ->where('nn_id',$id)
        ->where('trangthai','like','choxacnhan')
        ->whereRaw("TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') < 15")
        ->orderBy('thoigiandangky')
        ->get()
        ->toArray();

         $update = DB::table('hoadon')
        ->where('nn_id',$id)
        ->where('trangthai','choxacnhan')
        ->whereRaw("TIMESTAMPDIFF(MINUTE,thoigiandangky,'".$now."') > 15")
        ->update(['trangthai'=>'quathoihan']);

        $data = DB::table('hoadon')
        ->where('nn_id',$id)
        ->where('trangthai','<>','choxacnhan')
        ->orderBy('thoigiandangky')
        ->get();

        $hotel_name = DB::table('nha_nghi')->select('ten')->where('id',$id)->first();
        $status = Lang::get('hotel/general.trangthai');

        if(isset($hotel_name)) $hotel_name = $hotel_name->ten;
        return view('admin.hotels.billsList')->with([
                'id'                =>  $id,
                'data'              =>  $data,
                'data_new_booking'  =>  $data_new_booking,
                'hotel_name'        =>  $hotel_name,
                'status'            =>  $status,
                'count_new_booking' =>  count($data_new_booking)
            ]);
    }

    public function test(){
        return view('admin.hotels.form_wizards_demo');
    }
}
