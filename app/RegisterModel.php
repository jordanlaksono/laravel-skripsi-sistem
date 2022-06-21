<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegisterModel extends Model
{
    public function get_max(){
        return DB::table('users')->orderBy('fc_kdusers', 'desc')->first();
    }

    public function addData($data){
        DB::table('users')->insert($data);
    }

    public function addDataDetail($data){
        DB::table('t_informasi_pembimbing')->insert($data);
    }

    public function get_duration(){
        return DB::table('tm_jam_dosen')->get();
    }

    public function addDuration($data){
        DB::table('td_duration')->insert($data);
    }

    public function addAvailability($data){
        DB::table('td_availability')->insert($data);
    }
}
