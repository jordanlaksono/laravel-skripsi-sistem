<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DosenModel;
use App\SkripsiModel;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function __construct()
    {
        //untuk proteksi setiap controller
        $this->middleware('auth');
        $this->DosenModel = new DosenModel();
        $this->SkripsiModel = new SkripsiModel();
    }

    public function index(){
        $data = [
            'dosen' => $this->DosenModel->getAllDosen(),
        ];
        return view('dosen.v_dosen', $data);
    }

    public function calender($fc_kdusers){
        $kode_booking = $this->DosenModel->get_max();


        $urut = @$kode_booking->fc_kdbooking;

        $urut++;

        //$char = "ML";

        $kode = sprintf("%08s", $urut);

        $dosen = $this->DosenModel->get_data_dosen($fc_kdusers);

        $data = [
            'kode_users' => $fc_kdusers,
            'kode_booking' => $kode,
            'dosen' => $this->DosenModel->GetDetailDosen($dosen->fc_kdusers_dosen)
        ];

        return view('dosen.calender', $data);
    }

    public function skripsi($fc_kdusers){
        $data = [
            "kode_users" => $fc_kdusers
        ];
        return view('dosen.v_skripsi', $data);
    }

    public function detail_skripsi_mahasiswa($fc_kdusers){
        $pembimbing = $this->DosenModel->getDataPembimbing($fc_kdusers);
        $data = [
            "kode_users" => $fc_kdusers,
            'detail_skripsi' => $this->DosenModel->getAllDetailSkripsi($fc_kdusers),
            "check_p1" => $this->DosenModel->getCheckP1($fc_kdusers),
            "check_p2" => $this->DosenModel->getCheckP2($fc_kdusers),
            "dosen" => $this->DosenModel->GetDetailDosen($pembimbing->fc_kdusers_dosen),
            'get_check_po' => $this->DosenModel->getCheckP0($pembimbing->fc_kdusers_mahasiswa,$pembimbing->fc_kdusers_dosen),
            'get_status_po' => $this->DosenModel->getStatusP0($pembimbing->fc_kdusers_mahasiswa,$pembimbing->fc_kdusers_dosen),
            // 'get_log' => $this->DosenModel->getLog($pembimbing->fc_kdusers_mahasiswa),
        ];
        return view('dosen.v_detail_skripsi', $data);
    }

    public function load_data($kode_user){
        $event_data = $this->DosenModel->getallData($kode_user);

        return \Response::json($event_data);
    }

    public function load_data_skripsi($kode_user){
        $event_data = $this->DosenModel->getallDataSkripsi($kode_user);

        return \Response::json($event_data);
    }

    public function load_form($id){
        $event_data = $this->DosenModel->getallForm($id);

        return \Response::json($event_data);
    }

    public function load_event($id){
        $event_data = $this->DosenModel->getallEvent($id);

        return \Response::json($event_data);
    }

    public function load_log($id){
        $event_data = $this->DosenModel->getallLog($id);

        return \Response::json($event_data);
    }

    public function insert_booking_confirm(){
        $data = [
            'fc_kddetbooking' => Request()->fc_kddetbooking,
            'fc_kdbooking' => Request()->fc_kdbooking,
            'fc_kdusers' => Auth::user()->fc_kdusers,
            'fv_urgensi' => Request()->fv_urgensi,
            'fd_date' => date('Y-m-d'),
        ];

        $this->DosenModel->addBookingConfirm($data);

        $data_update = [
            'fc_sts' => '2'
        ];

        $this->DosenModel->updateStatus(Request()->fc_kddetbooking, $data_update);

        return redirect()->route('dosen')->with('pesan', 'Booking Jadwal Berhasil Di Konfirmasi !!');
    }

    public function load_jadwal($start, $dt, $kode_dosen){
        $status =  $this->DosenModel->getAllStatusDuration($kode_dosen);

        $event_data = $this->DosenModel->getallDataJadwal($status->fc_isi, $start, $dt, $kode_dosen);
       // dd($event_data);
        return \Response::json($event_data);
    }

    public function insert_booking_detail(){
        $kode_booking_temp = $this->DosenModel->get_max_temp();


        $urut = @$kode_booking_temp->fc_kdbooking_temp;

        $urut++;

        //$char = "ML";

        $kode = sprintf("%08s", $urut);

        $id_dosen = Request()->kode_user_dosen;
    //    dd($id_dosen);
        $dosen =  $this->DosenModel->getDosen($id_dosen);
      //  dd($dosen->fc_isi);
        $menit =  $this->DosenModel->getMenitDuration($dosen->fc_isi);
      //  dd($menit);
        $timestamp = strtotime(Request()->jam_start) + 60*$menit->fn_menit;
        $now = date('Y-m-d H:i:s');
        $now = Request()->tanggal." ".Request()->jam_start;
        $now_tgl = date('Y-m-d');
        $now_tgl = Request()->tanggal;

        $data = [
            'start' => $now,
            'end' => Request()->tanggal." ".date('H:i:s', $timestamp),
            'fc_kdbooking' => Request()->kode_booking,
            'fc_kdbooking_temp' => $kode,
            'fc_booking_start' => Request()->jam_start,
            'fc_booking_end' => date('H:i:s', $timestamp),
            'fd_date_book' => $now_tgl,
            'created_at' => date('Y-m-d H:i:s'),
            'fc_kdjam' => Request()->kode_jam,
            'fc_kdusers_dosen' => Request()->kode_user_dosen,
            'fc_kdusers_mahasiswa' => Request()->kode_user_mahasiswa,
        ];
        //dd($data);
        $this->DosenModel->addTempBooking($data);
        return \Response::json($data);
        //return redirect()->route('dosen_det', [$kode, $kode]);
    }

    public function ajax_get_booking($kode_booking){
        $event_data = $this->DosenModel->ajax_get_booking($kode_booking);

        return \Response::json($event_data);
    }

    public function insert_booking_detail_confirm(){
        $data = [
            'title' => Request()->urgensi,
            'start' => Request()->start,
            'end' => Request()->end,
            'fc_kdbooking' => Request()->fc_kdbooking,
            'fc_booking_start' => Request()->fc_booking_start,
            'fc_booking_end' => Request()->fc_booking_end,
            'fd_date_book' => Request()->fd_date_book,
            'fc_kdjam' => Request()->fc_kdjam,
            'created_at' => Request()->created_at,
            'fc_kdjam' => Request()->fc_kdjam,
            'fc_kdusers_mahasiswa' => Request()->kode_mahasiswa,
            'fc_kdusers_dosen' => Request()->kode_dosen,
            'fc_link_google_meet' => Request()->link,
            'fc_approve' => 'B',
        ];


        $this->DosenModel->addBooking($data);

        return redirect()->route('confirm_booking', [Request()->kode_mahasiswa])->with('pesan', 'Booking Jadwal Berhasil Di Konfirmasi !!');
    }

    public function booking($kode){
        return view('dosen.v_notifikasi_booking');
    }

    public function load_booking_all($tgl, $kode_user){
        if ($tgl==0) {
            $tgl="";
        }

        return \Response::json($this->DosenModel->getAllBooking($tgl, $kode_user));
    }

    public function bookingsDetail($kode_booking){
        $data = [
            'detail_booking' => $this->DosenModel->getAllDetailBooking($kode_booking),
            'detail_question' => $this->DosenModel->getAllDetailQuestion($kode_booking),
        ];
       // dd($data);
        return view('dosen.v_detail_booking', $data);
    }

    public function insert_log(){
        //Jika ada data kosong
        Request()->validate([
            'pebimbing' => 'required',
            'tanggal_kegiatan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'uraian' => 'required',
        ],[
            'pebimbing.required' => 'Wajib Diisi!!',
            'tanggal_kegiatan.required' => 'Wajib Diisi!!',
            'jam_mulai.required' => 'Wajib Diisi!!',
            'jam_selesai.required' => 'Wajib Diisi!!',
            'ruang.required' => 'Wajib Diisi!!',
            'uraian.required' => 'Wajib Diisi!!'
        ]);

        $data = [
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_kdusers_mahasiswa' =>Auth::user()->fc_kdusers,
                'fd_date_kegiatan' => Request()->tanggal_kegiatan,
                'ft_jam_mulai' => Request()->jam_mulai,
                'ft_jam_selesai' => Request()->jam_selesai,
                'fv_lokasi' => Request()->ruang,
                'fv_uraian' => Request()->uraian,
        ];


        $this->DosenModel->addLog($data);

        return \Response::json();

    }

    public function insert_doc_p0(){

        Request()->validate([
            'fc_doc_p0' => 'required|mimes:pdf|max:2024',
        ],[
            'fc_doc_p0.required' => 'Wajib Diisi!!',
        ]);

        $file = Request()->fc_doc_p0;
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('doc'), $fileName);

        $data_doc = $this->DosenModel->getDataDoc(Auth::user()->fc_kdusers, Request()->kode_dosen);

        if(@$data_doc->fc_doc_p0==""){
            $data = [
                'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_doc_p0' => $fileName,
                'fc_sts_p0' => 'S'
            ];

            $this->DosenModel->addBab1($data);
        }else{
            $data = [
                'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_doc_p0' => $fileName,
                'fc_sts_p0' => 'S'
            ];

            $this->DosenModel->editDataDoc(Auth::user()->fc_kdusers, Request()->kode_dosen, $data);
        }

         $data_log = [

            'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
            'log' => 'Pengajuan Dokumen P0',
            'status_log' => "Diproses",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function insert_doc_p1(){

        Request()->validate([
            'fc_doc_p1' => 'required|mimes:pdf|max:2024',
        ],[
            'fc_doc_p1.required' => 'Wajib Diisi!!',
        ]);

        $file = Request()->fc_doc_p1;
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('doc'), $fileName);

        $data_doc = $this->DosenModel->getDataDoc(Auth::user()->fc_kdusers, Request()->kode_dosen);

        if(@$data_doc->fc_kdusers_dosen!=Request()->kode_dosen && @$data_doc->fc_kdusers_mahasiswa!=Auth::user()->fc_kdusers && @$data_doc->fc_doc_p1==""){

            $data = [
                'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_doc_p1' => $fileName,
                'fc_sts_p1' => 'S'
            ];

            $this->DosenModel->addBab1($data);
        }else{
            $data = [
                'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_doc_p1' => $fileName,
                'fc_sts_p1' => 'S'
            ];

            $this->DosenModel->editDataDoc(Auth::user()->fc_kdusers, Request()->kode_dosen, $data);
        }

        $data_log = [

            'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
            'log' => 'Pengajuan Dokumen P1',
            'status_log' => "Diproses",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function insert_doc_p2(){

        Request()->validate([
            'fc_doc_p2' => 'required|mimes:pdf|max:2024',
        ],[
            'fc_doc_p2.required' => 'Wajib Diisi!!',
        ]);

        $file = Request()->fc_doc_p2;
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('doc'), $fileName);

        $data_doc = $this->DosenModel->getDataDoc(Auth::user()->fc_kdusers, Request()->kode_dosen);

        if(@$data_doc->fc_kdusers_dosen!=Request()->kode_dosen && @$data_doc->fc_kdusers_mahasiswa!=Auth::user()->fc_kdusers && @$data_doc->fc_doc_bab3==""){

            $data = [
                'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_doc_p2' => $fileName,
                'fc_sts_p2' => 'S'
            ];

            $this->DosenModel->addBab1($data);
        }else{
            $data = [
                'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
                'fc_kdusers_dosen' => Request()->kode_dosen,
                'fc_doc_p2' => $fileName,
                'fc_sts_p2' => 'S'
            ];

            $this->DosenModel->editDataDoc(Auth::user()->fc_kdusers, Request()->kode_dosen, $data);
        }

        $data_log = [

            'fc_kdusers_mahasiswa' => Auth::user()->fc_kdusers,
            'log' => 'Pengajuan Dokumen P2',
            'status_log' => "Diproses",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function getStatusP0($kode_dosen, $kode_mahasiswa){
        $status = $this->DosenModel->detailDataId($kode_dosen, $kode_mahasiswa);
        return \Response::json($status);
    }

    public function getCheckStatusP0($kode_dosen, $kode_mahasiswa){
        $status = $this->DosenModel->getCheckStatusP0($kode_dosen, $kode_mahasiswa);
        return \Response::json($status);
    }
}
