<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DosenModel extends Model
{
    public function getAllDosen(){
        return DB::table('users')->where('level', '3')->get();
    }

    public function getallData($kode_user){
        return DB::table('events')->where('fc_kdusers_dosen',$kode_user)->get();
    }

    public function getallDataSkripsi($kode_user){
        return DB::table('users')
                  ->where('fc_kdusers',$kode_user)->get();
    }

    public function getallForm($id){
        return DB::table('t_form_question')
                 ->select('t_form_question.*', 'events.fc_kdusers')
                 ->leftJoin('events', 't_form_question.fc_kdbooking', '=', 'events.fc_kdbooking')
                 ->where('t_form_question.fc_kddetbooking',$id)
                 ->groupBy('t_form_question.fn_id','fv_shorthand_code')
                 ->get();
    }

    public function addBookingConfirm($data){
        DB::table('t_confirm_booking')->insert($data);
    }

    public function updateStatus($id, $data){
        DB::table('t_form_question')
            ->where('fc_kddetbooking',$id)
            ->update($data);
    }

    public function getallEvent($id){
        return DB::table('events')->where('fc_kddetbooking',$id)->get();
    }

    public function getallLog($id){
        return DB::table('t_log_skripsi')->where('fc_kdusers_mahasiswa',$id)->get();
    }

    public function getAllStatusDuration($kode_user){
        return DB::table('users')->select('fc_isi','fc_kdusers')->where('fc_kdusers', $kode_user)->first();
    }

    public function getallDataJadwal($status, $start, $dt, $kode_dosen){

        return DB::table('td_availability as a')
                ->select('b.*', 'c.fv_days','c.fc_sts_aktif', 'd.fv_keterangan','a.fc_sts as sts'
                )
                ->leftJoin('tm_jam_dosen as b','a.fc_kdjam','=','b.fc_kdjam')
                ->leftJoin('td_duration as d','b.fn_id','=','d.fn_id_jam')
                ->leftJoin('tm_days as c','a.fc_kddays','=','c.fc_kddays')
                ->where('a.fc_kdjam', $status)
                ->where('c.fv_days', $dt)
                // ->where('a.fc_sts', 1)
                ->where('a.fc_kdusers_dosen', $kode_dosen)
                ->groupBy('fn_id')
                ->get();
    }

    public function get_max(){
        return DB::table('events_temp')->orderBy('fc_kdbooking', 'desc')->first();
    }

    public function get_max_temp(){
        return DB::table('events_temp')->orderBy('fc_kdbooking_temp', 'desc')->first();
    }

    public function get_data_dosen($kode_user){
        return DB::table('t_informasi_pembimbing')->where('fc_kdusers_mahasiswa', $kode_user)->first();
    }

    public function getDataPembimbing($kode_user){
        return DB::table('t_informasi_pembimbing')->where('fc_kdusers_mahasiswa', $kode_user)->first();
    }

    public function GetDetailDosen($kode_user){
        return DB::table('users')->where('fc_kdusers', $kode_user)->first();
    }

    public function addTempBooking($data){
        DB::table('events_temp')->insert($data);
    }

    public function ajax_get_booking($kode_booking){
        return DB::table('events_temp')->where('fc_kdbooking', $kode_booking)->first();
    }

    public function addBooking($data){
        DB::table('events')->insert($data);
    }

    public function getAllBooking($tgl="", $kode_user){
        if($tgl!=""){
            return DB::table('events')->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->where('fd_date_book', $tgl)->where('fc_kdusers_mahasiswa', $kode_user)->where('fc_approve', '<>', 'B')->groupBy('fc_kdbooking')->get();
        }else{
            return DB::table('events')->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->where('fc_kdusers_mahasiswa', $kode_user)->groupBy('fc_kdbooking')->where('fc_approve', '<>', 'B')->get();
        }
    }

    public function getMenitDuration($fc_isi){
        return DB::table('tm_jam_dosen')->where('fc_kdjam', $fc_isi)->first();
    }

    public function getDosen($kode_user){
        return DB::table('users')->where('fc_kdusers', $kode_user)->first();
    }

    public function getAllDetailBooking($kode_booking){
        return DB::table('events')->where('fc_kdbooking', $kode_booking)->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->first();
    }

    public function getAllDetailQuestion($kode_booking){
        return DB::table('events')->leftJoin('users','events.fc_kdusers_mahasiswa','=','users.fc_kdusers')->where('fc_kdbooking', $kode_booking)->first();
    }

    public function getAllDetailSkripsi($kode_user){
        return DB::table('users')->where('fc_kdusers', $kode_user)->first();
    }

    public function getCheckP1($kode_user){
        return DB::table('t_p0')->where('fc_kdusers_mahasiswa', $kode_user)->where('fc_sts_p0', 'Y')->count();
    }

    public function getCheckP2($kode_user){
        return DB::table('t_p1')->where('fc_kdusers_mahasiswa', $kode_user)->where('fc_sts', 'Y')->count();
    }

    public function getCheckP0($kode_mahasiswa, $kode_dosen){
        return DB::table('t_p0')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->where('fc_kdusers_dosen', $kode_dosen)->count();
    }

    public function addLog($data){
        DB::table('t_log')->insert($data);
    }

    public function addBab1($data){
        DB::table('t_p0')->insert($data);
    }


    public function getStatusP0($kode_mahasiswa, $kode_dosen){
        return DB::table('t_p0')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->where('fc_kdusers_dosen', $kode_dosen)->first();
    }

    public function detailDataId($kode_dosen,$kode_mahasiswa){
        return DB::table('t_p0')->select(DB::raw('count(*) as jml'))->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->where('fc_kdusers_dosen', $kode_dosen)->first();
    }

    public function getCheckStatusP0($kode_dosen,$kode_mahasiswa){
        return DB::table('t_p0')->select('fc_sts_p0','fc_sts_p1', 'fc_sts_p2')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->where('fc_kdusers_dosen', $kode_dosen)->first();
    }

    public function getDataDoc($kode_mahasiswa, $kode_dosen){
        return DB::table('t_p0')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->where('fc_kdusers_dosen', $kode_dosen)->first();
    }

    public function editDataDoc($kode_mahasiswa, $kode_dosen ,$data){
        DB::table('t_p0')
            ->where('fc_kdusers_mahasiswa',$kode_mahasiswa)
            ->where('fc_kdusers_dosen',$kode_dosen)
            ->update($data);
    }

    public function getLog($kode_mahasiswa){
        return DB::table('t_log_skripsi')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->orderBy('id', 'desc')->get();
    }

}
