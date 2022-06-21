<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingsModel extends Model
{
    public function getallDataQuestion($kode_booking){
        return DB::table('tm_question')->where('fc_kdbooking', $kode_booking)->get();
    }

    public function addQuestion($data){
        DB::table('tm_question')->insert($data);
    }

    public function get_by_id($id){
        return DB::table('tm_question')->where('fn_id', $id)->first();
    }

    public function updateQuestion($id, $data){
        DB::table('tm_question')
            ->where('fn_id',$id)
            ->update($data);
    }

    public function updateAterBooking($id, $data){
        DB::table('t_after_booking')
        ->where('fc_kdbooking',$id)
        ->update($data);
    }

    public function updateSts($id, $data){
        DB::table('td_availability')
        ->where('fn_availability',$id)
        ->update($data);
    }

    public function detailDataId($id){
        return  DB::table('tm_question')->where('fn_id', $id)->first();
    }

    public function deletData($fn_id){
        DB::table('tm_question')
        ->where('fn_id',$fn_id)
        ->delete();

    }

    public function getAllBooking($tgl="", $kode_users){
        if($tgl!=""){
            return DB::table('events')->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->where('fd_date_book', $tgl)->where('fc_kdusers_dosen', $kode_users)->orderBy('id', 'desc')->groupBy('fc_kdbooking')->get();
        }else{
            return DB::table('events')->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->where('fc_kdusers_dosen', $kode_users)->orderBy('id', 'desc')->groupBy('fc_kdbooking')->get();
        }
    }

    public function getAllDetailBooking($kode_booking){
        return DB::table('events')->where('fc_kdbooking', $kode_booking)->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->first();
    }

    public function getAllDetailQuestion($kode_booking){
        return DB::table('events')->leftJoin('users','events.fc_kdusers_mahasiswa','=','users.fc_kdusers')->where('fc_kdbooking', $kode_booking)->first();
    }

    public function detailDataId2($id){
        return DB::table('events')->where('id', $id)->leftJoin('tm_jam_dosen','events.fc_kdjam','=','tm_jam_dosen.fc_kdjam')->first();
    }

    public function deletDataBooking($id){
        DB::table('events')
        ->where('id',$id)
        ->delete();

    }

    public function getAllAfterBooking($kode_booking){
        return  DB::table('t_after_booking')->where('fc_kdbooking', $kode_booking)->first();
    }

    public function getAllDay($fc_isi, $kode_users){
        return DB::table('tm_days')->leftJoin('td_availability','tm_days.fc_kddays','=','td_availability.fc_kddays')->where('td_availability.fc_kdjam', $fc_isi)->where('fc_kdusers_dosen', $kode_users)->get();
    }

    public function getAllTime($fc_isi, $kode_users){
        return DB::table('tm_jam_dosen')->leftJoin('td_availability','tm_jam_dosen.fc_kdjam','=','td_availability.fc_kdjam')->where('tm_jam_dosen.fc_kdjam', $fc_isi)->where('fc_kdusers_dosen', $kode_users)->get();
    }

    public function getAllTime2($fc_isi, $kode_users){
        return DB::table('tm_jam_dosen')->leftJoin('td_duration','tm_jam_dosen.fn_id','=','td_duration.fn_id_jam')->where('fc_kdjam', $fc_isi)->where('fc_kdusers_dosen', $kode_users)->get();
    }

    public function update_status_day($data){
        DB::table('tm_days')->whereIn('fc_kddays', $data)->update(array('fc_sts_aktif' => 1));
    }

    public function update_status_day2($data){
        DB::table('tm_days')->whereIn('fc_kddays', $data)->update(array('fc_sts_aktif' => 2));
    }

    public function updateStsBreak($id, $data){
        DB::table('td_duration')
        ->where('Id',$id)
        ->update($data);
    }

    public function getAllStatusDuration($kode_user){
        return DB::table('users')->select('fc_isi','fc_kdusers')->where('fc_kdusers', $kode_user)->first();
    }

    public function getAllJam(){
        return DB::table('tm_jam_dosen')->groupBy('fc_kdjam')->get();
    }

    public function updateDuration($id, $data){
        DB::table('users')
        ->where('fc_kdusers',$id)
        ->update($data);
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
