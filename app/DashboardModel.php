<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardModel extends Model
{
    public function getCountBookingUser($id_user){
        return DB::table('tm_booking')->where('fc_kdusers', $id_user);
    }

    public function get_max(){
        return DB::table('tm_booking')->orderBy('fc_kdbooking', 'desc')->first();
    }

    public function addBooking($data){
        DB::table('tm_booking')->insert($data);
    }

    public function getAllBooking($id_user, $tgl=""){
        if($tgl!=""){
            return DB::table('tm_booking')->where('fc_kdusers', $id_user)->where('fd_date', $tgl)->get();
        }else{
            return DB::table('tm_booking')->where('fc_kdusers', $id_user)->get();
        }

    }

    public function detailData($kode_booking){
        return  DB::table('tm_booking')->where('fc_kdbooking', $kode_booking)->first();
    }

    public function editData($kode_booking, $data){
        DB::table('tm_booking')
            ->where('fc_kdbooking',$kode_booking)
            ->update($data);
    }

    public function updateAktif($id, $data){
        DB::table('tm_booking')
            ->where('fn_id',$id)
            ->update($data);
    }

    public function updateNonAktif($id, $data){
        DB::table('tm_booking')
            ->where('fn_id',$id)
            ->update($data);
    }

    public function deletData($kode_booking){
        DB::table('tm_booking')
        ->where('fc_kdbooking',$kode_booking)
        ->delete();

    }

    public function detailDataId($id){
        return  DB::table('tm_booking')->where('fn_id', $id)->first();
    }

    public function addQuestionConfirm($data){
        DB::table('tm_question')->insert($data);
    }

    public function addAfterBooking($data){
        DB::table('t_after_booking')->insert($data);
    }
}
