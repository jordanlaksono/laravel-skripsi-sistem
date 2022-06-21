<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SkripsiModel extends Model
{
    public function getAllMahasiswa($kode_user){
        return DB::table('t_informasi_pembimbing')
        	  ->leftJoin('users', 't_informasi_pembimbing.fc_kdusers_mahasiswa', '=', 'users.fc_kdusers')
        	  ->where('t_informasi_pembimbing.fc_kdusers_dosen', $kode_user)
        	  ->get();
    }

    public function getallDataDocument($kode_mahasiswa){
    	 return DB::table('t_p0')
                  ->where('fc_kdusers_mahasiswa',$kode_mahasiswa)->get();
    }

    public function updateApproveBab1($id, $data){
        DB::table('t_p0')
            ->where('fnid',$id)
            ->update($data);
    }

    public function updateTolakBab1($id, $data){
        DB::table('t_p0')
            ->where('fnid',$id)
            ->update($data);
    }

    public function addLog($data){
        DB::table('t_log_skripsi')->insert($data);
    }

    public function getCountLog($kode_mahasiswa){
        return DB::table('t_log')
            ->select(DB::raw('count(*) as log_count'))
            ->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->first();
    }

    public function getStatusP0($kode_mahasiswa){
       return DB::table('t_p0')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->first();

    }

    public function editP0($kode_mahasiswa,$data){
        DB::table('t_p0')
            ->where('fc_kdusers_mahasiswa',$kode_mahasiswa)
            ->update($data);
    }

    public function getDataPembimbing($kode_user){
        return DB::table('t_informasi_pembimbing')->where('fc_kdusers_mahasiswa', $kode_user)->first();
    }

    public function getStatusDoc($kode_mahasiswa, $kode_dosen){
        return DB::table('t_p0')->where('fc_kdusers_mahasiswa', $kode_mahasiswa)->where('fc_kdusers_dosen', $kode_dosen)->first();
    }
}
