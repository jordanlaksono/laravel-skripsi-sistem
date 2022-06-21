<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SkripsiModel;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class SkripsiController extends Controller
{
    public function __construct()
    {
        //untuk proteksi setiap controller
       $this->middleware('auth');
        $this->SkripsiModel = new SkripsiModel();
    }

    public function index(){
        // $status =  $this->CalenderModel->getAllStatusDuration();

        $data = [
            'mahasiswa' => $this->SkripsiModel->getAllMahasiswa(Auth::user()->fc_kdusers),
        ];
        return view('skripsi.v_list_skripsi', $data);
    }

    public function skripsi_detail($kode_mahasiswa){
        $pembimbing = $this->SkripsiModel->getDataPembimbing($kode_mahasiswa);
        $data = [
            'kode_mahasiswa' => $kode_mahasiswa,
            'count_log' => $this->SkripsiModel->getCountLog($kode_mahasiswa),
            'status' => $this->SkripsiModel->getStatusP0($kode_mahasiswa),
            'get_status_po' => $this->SkripsiModel->getStatusDoc($pembimbing->fc_kdusers_mahasiswa,$pembimbing->fc_kdusers_dosen),
        ];
        return view('skripsi.v_detail_skripsi', $data);
    }

    public function load_data_document($kode_mahasiswa){
        $event_data = $this->SkripsiModel->getallDataDocument($kode_mahasiswa);

        return \Response::json($event_data);
    }

    public function approve_bab1($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab1' => 'Y'
        ];

        $this->SkripsiModel->updateApproveBab1($id, $data);

       // $date = Carbon::parse($value);
        //return $date->format('Y-m-d H:i:s');

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 1',
            'status_log' => "Disetujui",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function tolak_bab1($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab1' => 'N'
        ];

        $this->SkripsiModel->updateTolakBab1($id, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 1',
            'status_log' => "Ditolak",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function approve_bab2($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab2' => 'Y'
        ];

        $this->SkripsiModel->updateApproveBab1($id, $data);

       // $date = Carbon::parse($value);
        //return $date->format('Y-m-d H:i:s');

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 2',
            'status_log' => "Disetujui",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function tolak_bab2($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab2' => 'N'
        ];

        $this->SkripsiModel->updateTolakBab1($id, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 2',
            'status_log' => "Ditolak",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function approve_bab3($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab3' => 'Y'
        ];

        $this->SkripsiModel->updateApproveBab1($id, $data);

       // $date = Carbon::parse($value);
        //return $date->format('Y-m-d H:i:s');

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 3',
            'status_log' => "Disetujui",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function tolak_bab3($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab3' => 'N'
        ];

        $this->SkripsiModel->updateTolakBab1($id, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 3',
            'status_log' => "Ditolak",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function finish_p0(){
        $data = [
                'fc_sts_p0' => 'Y'
        ];

        $this->SkripsiModel->editP0(Request()->fc_kdusers_mahasiswa, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => Request()->fc_kdusers_mahasiswa,
            'log' => 'Validasi P0',
            'status_log' => "Divalidasi",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function approve_bab4($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab4' => 'Y'
        ];

        $this->SkripsiModel->updateApproveBab1($id, $data);

       // $date = Carbon::parse($value);
        //return $date->format('Y-m-d H:i:s');

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 4',
            'status_log' => "Disetujui",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function tolak_bab4($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab4' => 'N'
        ];

        $this->SkripsiModel->updateTolakBab1($id, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 4',
            'status_log' => "Ditolak",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function finish_p1(){
        $data = [
                'fc_sts_p1' => 'Y'
        ];

        $this->SkripsiModel->editP0(Request()->fc_kdusers_mahasiswa, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => Request()->fc_kdusers_mahasiswa,
            'log' => 'Validasi P0',
            'status_log' => "Divalidasi",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function approve_bab5($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab5' => 'Y'
        ];

        $this->SkripsiModel->updateApproveBab1($id, $data);

       // $date = Carbon::parse($value);
        //return $date->format('Y-m-d H:i:s');

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 5',
            'status_log' => "Disetujui",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function tolak_bab5($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab5' => 'N'
        ];

        $this->SkripsiModel->updateTolakBab1($id, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 5',
            'status_log' => "Ditolak",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function approve_bab6($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab6' => 'Y'
        ];

        $this->SkripsiModel->updateApproveBab1($id, $data);

       // $date = Carbon::parse($value);
        //return $date->format('Y-m-d H:i:s');

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 6',
            'status_log' => "Disetujui",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function tolak_bab6($id, $kode_mahasiswa){
        $data = [
            'fc_approve_bab6' => 'N'
        ];

        $this->SkripsiModel->updateTolakBab1($id, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => $kode_mahasiswa,
            'log' => 'Persetujan Bab 6',
            'status_log' => "Ditolak",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }

    public function finish_p2(){
        $data = [
                'fc_sts_p2' => 'Y'
        ];

        $this->SkripsiModel->editP0(Request()->fc_kdusers_mahasiswa, $data);

        $data_log = [

            'fc_kdusers_mahasiswa' => Request()->fc_kdusers_mahasiswa,
            'log' => 'Validasi P0',
            'status_log' => "Divalidasi",
            'date_log' => date('Y-m-d'),
            'time_log' => date('H:i:s')
        ];

        $this->SkripsiModel->addLog($data_log);

        return \Response::json();
    }



}
