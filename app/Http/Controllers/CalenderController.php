<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalenderModel;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class CalenderController extends Controller
{
    public function __construct()
    {
        //untuk proteksi setiap controller
       // $this->middleware('auth');
        $this->CalenderModel = new CalenderModel();
    }

    public function index(){
        $status =  $this->CalenderModel->getAllStatusDuration();

        $data = [
            'jam_booking' => $this->CalenderModel->getAllJamBooking($status->fc_isi),
        ];

        return view('profile.calender', $data);
    }

    public function load_data($kode_dosen){
        $event_data = $this->CalenderModel->getallData($kode_dosen);

        return \Response::json($event_data);
    }

    public function load_jadwal($start, $dt){
        $status =  $this->CalenderModel->getAllStatusDuration();

        $event_data = $this->CalenderModel->getallDataJadwal($status->fc_isi, $start, $dt);
       // dd($event_data);
        return \Response::json($event_data);
    }

    public function load_booking($kode_booking){
        $event_data = $this->CalenderModel->getIdBooking($kode_booking);
       // dd($event_data);
        return \Response::json($event_data);
    }

    public function insert_booking_detail(){
        $kode_det_booking = $this->CalenderModel->get_max_det();

        // if(!$kode_booking->fc_kdbooking){
        //     $kode_booking->fc_kdbooking = "00000000";
        // }

        $urut = $kode_det_booking->fc_kddetbooking;

        $urut++;

        //$char = "ML";

        $kode = sprintf("%06s", $urut);
        $timestamp = strtotime(Request()->jam_start) + 60*60;
        $now = date('Y-m-d H:i:s');
        $now = Request()->tanggal." ".Request()->jam_start;
        $now_tgl = date('Y-m-d');
        $now_tgl = Request()->tanggal;

        $data = [
            'start' => $now,
            'end' => Request()->tanggal." ".date('H:i:s', $timestamp),
            'fc_kdbooking' => Request()->kode_booking,
            'fc_kddetbooking' => $kode,
            'fc_booking_start' => Request()->jam_start,
            'fc_booking_end' => date('H:i:s', $timestamp),
            'fd_date_book' => $now_tgl,
            'created_at' => date('Y-m-d H:i:s'),
            'fc_kdjam' => Request()->kode_jam,
        ];
        //dd($data);
        $this->CalenderModel->addDetailBooking($data);

        return redirect()->route('calender_det', [Request()->kode_booking, $kode]);
    }

    public function detail_booking($kode_booking,$kode_det_booking){
        $data = [
            'det_booking' => $this->CalenderModel->detailData($kode_det_booking),
            'form' => $this->CalenderModel->getAllForm2($kode_booking)
        ];
        return view('profile.detail_booking', $data);
    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function insert_konfirm_booking(){
        $data = [
            'title' => Request()->title,
            'start' => Request()->start,
            'end' => Request()->end,
            'fc_kdbooking' => Request()->fc_kdbooking,
            'fc_kddetbooking' => Request()->fc_kddetbooking,
            'fc_booking_start' => Request()->fc_booking_start,
            'fc_booking_end' => Request()->fc_booking_end,
            'fd_date_book' => Request()->fd_date_book,
            'fc_kdjam' => Request()->fc_kdjam,
            'fc_kdusers' => Auth::user()->fc_kdusers,
            'created_at' => Request()->created_at,
        ];


        $this->CalenderModel->addBookingConfirm($data);

        $value = Request()->fv_value;

        if($value <> ''){
            $det_question = array();
            for($ii = 0; $ii < count($value); $ii++) {

                $det_question[] = array(
                    'fc_kdbooking' => Request()->fc_kdbooking,
                    'fc_kddetbooking' => Request()->fc_kddetbooking,
                    'fc_type' => Request()->fc_type[$ii],
                    'fv_shorthand_code' => Request()->fv_shorthand_code[$ii],
                    'fv_value' => Request()->fv_value[$ii],
                    'fv_label' => Request()->fv_label[$ii],
                    'fc_sts' => '1'
                );
            }

            $this->CalenderModel->addQuestionConfirm($det_question);
        }

        return redirect()->route('calender_confirm', [Request()->fc_kdbooking, Request()->fc_kddetbooking]);
    }

    public function detail_confirm_booking($kode_booking, $kode_det_booking){
        $data = [
            'det_booking' => $this->CalenderModel->detailData($kode_det_booking),
            'after_booking' => $this->CalenderModel->getAfterBooking($kode_booking)
        ];
        return view('profile.detail_confirm_booking', $data);
    }

    public function update_booking_tolak(){
        $kode_booking = Request()->kode_booking;
        $data = [
            'fc_approve' => 'N'
        ];

        $this->CalenderModel->updateTolak($kode_booking, $data);

        return redirect()->route('calender')->with('pesan', 'Data Berhasil Di Update !!');
    }

    public function update_booking_terima(){
        $kode_booking = Request()->kode_booking;
       // dd($kode_booking)
        $data = [
            'fc_approve' => 'Y'
        ];

        $this->CalenderModel->updateTerima($kode_booking, $data);

        return redirect()->route('calender')->with('pesan', 'Data Berhasil Di Update !!');
    }
}
