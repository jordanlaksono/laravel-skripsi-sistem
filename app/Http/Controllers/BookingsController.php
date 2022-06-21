<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookingsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Batch;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->BookingsModel = new BookingsModel();
    }

    public function detail($kode_booking){
        return view('booking.detail_booking');
    }

    public function question($kode_booking)
    {
        $data = [
            'kode_booking' => $kode_booking
        ];
        return view('booking.form_question', $data);
    }

    public function load_question($kode_booking){
        $question = $this->BookingsModel->getallDataQuestion($kode_booking);
      //  dd($question);
        return \Response::json($question);
    }

    public function insert_question(){

        $data = [
            'fc_type' => Request()->fc_type,
            'fv_label' => Request()->fv_label,
            'fv_shorthand_code' => Request()->fv_shorthand_code,
            'fc_required' => Request()->fc_required,
            'fc_kdbooking' => Request()->fc_kdbooking,
        ];

        $this->BookingsModel->addQuestion($data);

        return \Response::json();
    }

    public function update_question($id) {
		$data = $this->BookingsModel->get_by_id($id);
		return \Response::json($data);
	}

    public function question_update(){

        $data = [
            'fc_type' => Request()->fc_type_update,
            'fv_label' => Request()->fv_label_update,
            'fv_shorthand_code' => Request()->fv_shorthand_code_update,
            'fc_required' => Request()->fc_required
        ];

        $this->BookingsModel->updateQuestion(Request()->fn_id, $data);

        return \Response::json();
    }

    public function getID($id){
        $booking = $this->BookingsModel->detailDataId($id);
        return \Response::json($booking);
    }

    public function delete_question(){
        $fn_id = Request()->fn_id;

        $this->BookingsModel->deletData($fn_id);
        return \Response::json();
    }

    public function load_booking_all($tgl, $kode_user){
        if ($tgl==0) {
            $tgl="";
        }

        return \Response::json($this->BookingsModel->getAllBooking($tgl, $kode_user));
    }

    public function bookingsDetail($kode_booking){
        $data = [
            'detail_booking' => $this->BookingsModel->getAllDetailBooking($kode_booking),
            'detail_question' => $this->BookingsModel->getAllDetailQuestion($kode_booking),
        ];
       // dd($data);
        return view('booking.v_detail_booking', $data);
    }

    public function getID2($id){
        $booking = $this->BookingsModel->detailDataId2($id);
        return \Response::json($booking);
    }

    public function delete_detail_booking(){
        $id = Request()->id;
        $kode_booking = Request()->kode_booking;
       // dd($id);
        $this->BookingsModel->deletDataBooking($id);
        return redirect()->route('bookings', [$kode_booking]);
    }

    public function availability(){
        $fc_kdusers = Auth::user()->fc_kdusers;
        $status =  $this->BookingsModel->getAllStatusDuration($fc_kdusers);


        $data = [
            // 'kode_booking' => $kode_booking,
            'day' => $this->BookingsModel->getAllDay($status->fc_isi, $fc_kdusers),
            'jam' => $this->BookingsModel->getAllTime($status->fc_isi, $fc_kdusers),
            'time' => $this->BookingsModel->getAllTime2($status->fc_isi, $fc_kdusers),
        ];
        return view('booking.availability', $data);
    }

    public function after_booking($kode_booking){
        $data = [
            'after_booking' => $this->BookingsModel->getAllAfterBooking($kode_booking),
        ];

        return view('booking.after_booking', $data);
    }

    public function after_booking_update(){
        Request()->validate([
            'fv_isi' => 'required',
        ],[
            'fv_isi.required' => 'Wajib Diisi!!',
        ]);

        $data = [
            'fv_isi' => Request()->fv_isi,
        ];

        $this->BookingsModel->updateAterBooking(Request()->fc_kdbooking, $data);

        return redirect()->route('after_booking', [Request()->fc_kdbooking])->with('pesan', 'Data Berhasil Di Update !!');
    }

    public function update_sts_days(){
        $fn_availability2 = Request()->fn_availability;
        $check = Request()->sts;

        $days = array();
        $ceken = array();
        for ($i=0; $i < count($fn_availability2); $i++) {

            $data = [
                'fc_sts' => Request()->sts[$i],
            ];

           // dd($data);

            $this->BookingsModel->updateSts(Request()->fn_availability[$i], $data);

        }

        return redirect()->route('availability')->with('pesan', 'Data Berhasil Di Update !!');

    }

    public function update_break(){
        $fn_id = Request()->fn_id;

        for ($i=0; $i < count($fn_id); $i++) {

            $data = [
                'fv_keterangan' => Request()->fv_ket[$i],
            ];

           // dd($data);

            $this->BookingsModel->updateStsBreak(Request()->fn_id[$i], $data);
        }

        return redirect()->route('availability')->with('pesan2', 'Data Berhasil Di Update !!');
    }

    public function duration(){
        $fc_kdusers = Auth::user()->fc_kdusers;
        $data =  [
            // 'kode_booking' => $kode_booking,
            'status' => $this->BookingsModel->getAllStatusDuration($fc_kdusers),
            'kode_jam' => $this->BookingsModel->getAllJam(),
        ];
        return view('booking.duration', $data);
    }

    public function update_duration(){
        $data = [
            'fc_isi' => Request()->fc_isi
        ];

        $this->BookingsModel->updateDuration(Request()->ID, $data);

        return redirect()->route('duration')->with('pesan', 'Data Berhasil Di Update !!');
    }

    public function notifikasi(){
        return view('booking.notifikasi');
    }

    public function link($link){
        return redirect()->away($link);
    }

    public function update_booking_tolak(){
        $kode_booking = Request()->kode_booking;
        $data = [
            'fc_approve' => 'N'
        ];

        $this->BookingsModel->updateTolak($kode_booking, $data);

        return redirect()->route('notifikasi')->with('pesan', 'Data Berhasil Di Update !!');
    }

    public function update_booking_terima(){
        $kode_booking = Request()->kode_booking;
        $data = [
            'fc_approve' => 'Y'
        ];

        $this->BookingsModel->updateTerima($kode_booking, $data);

        return redirect()->route('notifikasi')->with('pesan', 'Data Berhasil Di Update !!');
    }

}
