<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CalenderModel extends Model
{
    public function getallData($kode_dosen){
        return DB::table('events')->select('title','start','end','fc_kdbooking')->where('fc_kdusers_dosen', $kode_dosen)->get();
    }

    public function getAllStatusDuration(){
        return DB::table('t_status')->where('fc_param', 'DURATION')->where('fc_kode', '01')->first();
    }

    public function getAllJamBooking($status){
        $subquery = DB::table('events')
                   ->select('COUNT(fc_booking_start)')
                   ->where('events.fc_booking_start', '=' ,'tm_jam_dosen.ft_jam_start');

        return DB::table('tm_jam_dosen')->select('tm_jam_dosen.*',
            DB::raw("(SELECT COUNT(fc_booking_start) FROM events
            WHERE events.fc_booking_start = tm_jam_dosen.ft_jam_start) as jml"))->where('fc_kdjam', $status)->get();
    }

    public function addDetailBooking($data){
        DB::table('events_temp')->insert($data);
    }

    public function get_max_det(){
        return DB::table('events_temp')->orderBy('fc_kddetbooking', 'desc')->first();
    }

    public function detailData($kode_booking){
        return  DB::table('events_temp')->where('fc_kddetbooking', $kode_booking)->first();
    }

    public function addBookingConfirm($data){
        DB::table('events')->insert($data);
    }

    public function addQuestionConfirm($data){
        DB::table('t_form_question')->insert($data);
    }

    public function getallDataJadwal($status, $start, $dt){

        return DB::table('td_availability as a')
                ->select('b.*',
                DB::raw("(SELECT COUNT(fc_booking_start) FROM events
                WHERE events.fc_booking_start = b.ft_jam_start and fd_date_book='".$start."') as jml"),
                DB::raw("(SELECT fd_date_book FROM events
                WHERE events.fc_booking_start = b.ft_jam_start and fd_date_book='".$start."') as date"),
                'c.fv_days','c.fc_sts_aktif'
                )
                ->leftJoin('tm_jam_dosen as b','a.fc_kdjam','=','b.fc_kdjam')
                ->leftJoin('tm_days as c','a.fc_kddays','=','c.fc_kddays')
                ->where('b.fc_kdjam', $status)
                ->where('c.fv_days', $dt)
                ->where('b.fc_sts', 1)
                ->get();
    }

    public function getAllForm(){
        return DB::table('tm_question')->get();
    }

    public function getAllForm2($kode_booking){
        return DB::table('tm_question')->where('fc_kdbooking', $kode_booking)->get();
    }

    public function getAfterBooking($kode_booking){
        return DB::table('t_after_booking')->where('fc_kdbooking', $kode_booking)->first();
    }

    public function getIdBooking($kode_booking){
        return DB::table('events')->leftJoin('users','events.fc_kdusers_mahasiswa','=','users.fc_kdusers')->where('fc_kdbooking', $kode_booking)->get();
    }

    public function updateTolak($kode_booking, $data){
        DB::table('events')
            ->where('fc_kdbooking',$kode_booking)
            ->update($data);
    }

    public function updateTerima($kode_booking, $data){
        DB::table('events')
            ->where('fc_kdbooking',$kode_booking)
            ->update($data);
    }
}
