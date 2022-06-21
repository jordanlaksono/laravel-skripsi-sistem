<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\DashboardModel;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DashboardController extends Controller
{
    public function __construct()
    {
        //untuk proteksi setiap controller
        $this->middleware('auth');
        $this->DashboardModel = new DashboardModel();
    }

    public function index(){
        $fc_kdusers = Auth::user()->fc_kdusers;
      //  dd($fc_kdusers);
        $data = [
            'countBooking' => $this->DashboardModel->getCountBookingUser($fc_kdusers),
            'booking' => $this->DashboardModel->getAllBooking($fc_kdusers),
        ];
       // dd($data);
        return view('dashboard.v_dashboard', $data);
    }

    public function insert_booking(){
        //Jika ada data kosong
        Request()->validate([
            'title_book' => 'required',
            'page_link' => 'required',
            'foto_logo' => 'mimes:jpeg,jpg,png|max:1024',
        ],[
            'title_book.required' => 'Wajib Diisi!!',
            'page_link.required' => 'Wajib Diisi!!'
        ]);

        $kode_booking = $this->DashboardModel->get_max();

        // if(!$kode_booking->fc_kdbooking){
        //     $kode_booking->fc_kdbooking = "00000000";
        // }

        $urut = $kode_booking->fc_kdbooking;

        $urut++;

        //$char = "ML";

        $kode = sprintf("%08s", $urut);

        if(Request()->foto_logo <> ""){
            $file = Request()->foto_logo;
            $fileName = Request()->title_book.'.'.$file->extension();
            $file->move(public_path('images'), $fileName);

            $data = [
                'fc_kdusers' => Request()->fc_kdusers,
                'fc_kdbooking' => $kode,
                'fc_title_booking' => Request()->title_book,
                'fc_booking_link' => Request()->page_link,
                'fd_date' => date('Y-m-d'),
                'fv_logo' => $fileName,
            ];

            $this->DashboardModel->addBooking($data);
        }else{
            $data = [
                'fc_kdusers' => Request()->fc_kdusers,
                'fc_kdbooking' => $kode,
                'fc_title_booking' => Request()->title_book,
                'fc_booking_link' => Request()->page_link,
                'fd_date' => date('Y-m-d'),
            ];

            $this->DashboardModel->addBooking($data);
        }

        $question = array(
            array('fc_type'=>'SIMPLE', 'fv_label'=> 'First name', 'fv_shorthand_code'=>'FNAME', 'fc_kdbooking'=> $kode),
            array('fc_type'=>'SIMPLE', 'fv_label'=> 'Last name', 'fv_shorthand_code'=>'LNAME', 'fc_kdbooking'=> $kode),
            array('fc_type'=>'SIMPLE', 'fv_label'=> 'Email', 'fv_shorthand_code'=>'EMAIL', 'fc_kdbooking'=> $kode),
        );

        $this->DashboardModel->addQuestionConfirm($question);


        $after_booking = [

            'fc_kdbooking' => $kode,
            'fv_isi' => 'Thanks , You will receive a notification confirming the meeting details shortly.',
        ];

        $this->DashboardModel->addAfterBooking($after_booking);

        //return redirect()->route('dashboard');
        return \Response::json();
    }

    public function load_booking($tgl){
        if ($tgl==0) {
            $tgl="";
        }
	//	echo json_encode($this->barang_model->kota()->result_array());
        $fc_kdusers = Auth::user()->fc_kdusers;
        return \Response::json($this->DashboardModel->getAllBooking($fc_kdusers, $tgl));
	}

    public function editProfile($kode_booking){
        $data = [
            'booking' => $this->DashboardModel->detailData($kode_booking),
        ];
        return view('dashboard.v_dashboardprofile', $data);
    }

    public function update($kode_booking){
        Request()->validate([
            'fc_title_booking' => 'required',
            'fc_booking_link' => 'required',
            'fv_logo' => 'mimes:jpeg,jpg,png|max:1024',
        ],[
            'fc_title_booking.required' => 'Wajib Diisi!!',
            'fc_booking_link.required' => 'Wajib Diisi!!'
        ]);

        if(Request()->fv_logo <> ""){
            $file = Request()->fv_logo;
            $fileName = Request()->fc_title_booking.'.'.$file->extension();
            $file->move(public_path('images'), $fileName);

            $data = [

                'fc_title_booking' => Request()->fc_title_booking,
                'fc_booking_link' => Request()->fc_booking_link,
                'fv_ket' => Request()->fv_ket,
                'fd_date' => date('Y-m-d'),
                'fv_logo' => $fileName,
            ];

            $this->DashboardModel->editData($kode_booking, $data);
        }else{
            $data = [
                'fc_title_booking' => Request()->fc_title_booking,
                'fc_booking_link' => Request()->fc_booking_link,
                'fd_date' => date('Y-m-d'),
                'fv_ket' => Request()->fv_ket,
            ];

            $this->DashboardModel->editData($kode_booking, $data);
        }

        return redirect()->route('dashboard', [$kode_booking])->with('pesan', 'Data Berhasil Di Update !!');
    }

    public function update_aktif($id){
        $data = [
            'fc_sts' => '2'
        ];

        $this->DashboardModel->updateAktif($id, $data);

        return \Response::json();
    }

    public function update_non_aktif($id){
        $data = [
            'fc_sts' => '1'
        ];

        $this->DashboardModel->updateNonAktif($id, $data);

        return \Response::json();
    }

    public function deleteProfile($kode_booking){
        $booking = $this->DashboardModel->detailData($kode_booking);
       // dd($booking);
        if($booking->fv_logo <> 0){
            unlink(public_path('images').'/'.$booking->fv_logo);
        }

        $this->DashboardModel->deletData($kode_booking);
        return redirect()->route('/');
    }

    public function getID($id){
        $booking = $this->DashboardModel->detailDataId($id);
        return \Response::json($booking);
    }

    public function delete_booking(){
        $kode_booking = Request()->fc_kdbooking;
        // $booking = $this->DashboardModel->detailData($kode_booking);
        // if($booking->fv_logo <> 0){
        //     unlink(public_path('images').'/'.$booking->fv_logo);
        // }

        $this->DashboardModel->deletData($kode_booking);
        return \Response::json();
    }

    public function dashboardProfile(){
        return view('profile.beranda');
    }
}
