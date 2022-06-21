<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterModel;
use App\DosenModel;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->RegisterModel = new RegisterModel();
        $this->DosenModel = new DosenModel();
    }

    public function mahasiswa(){
        $data = [
            'dosen' => $this->DosenModel->getAllDosen(),
        ];
        return view('register.register_mahasiswa', $data);
    }

    public function insert_mahasiswa(){
        //Jika ada data kosong
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'judul_skripsi' => 'required',
            'password' => 'required|min:8',
            'photo' => 'required|mimes:jpeg,jpg,png|max:1024',
        ],[
            'name.required' => 'Wajib Diisi!!',
            'email.required' => 'Wajib Diisi!!',
            'jurusan.required' => 'Wajib Diisi!!',
            'judul_skripsi.required' => 'Wajib Diisi!!',
            'password.required' => 'Wajib Diisi!!',
            'password.min' => 'Min 8 Character',
            'photo.required' => 'Wajib Diisi!!',
        ]);

        $kode_user = $this->RegisterModel->get_max();
        //dd($kode_user);
        $urut = $kode_user->fc_kdusers;
       // dd($urut);
        $urut++;

        //$char = "ML";

        $kode = sprintf("%04s", $urut);

        $file = Request()->photo;
        $fileName = $kode.'.'.$file->extension();
        $file->move(public_path('photo'), $fileName);

        $data = [
            'fc_kdusers' => $kode,
            'nim' => Request()->nim,
            'name' => Request()->name,
            'email' => Request()->email,
            'jurusan' => Request()->jurusan,
            'judul_skripsi' => Request()->judul_skripsi,
            'password' => Hash::make(Request()->password),
            'level' => 2,
            'photo' => $fileName,
            'fc_isi' => 'A'
        ];

        $this->RegisterModel->addData($data);

        $data_detail = [
            'fc_kdusers_mahasiswa' => $kode,
            'fc_kdusers_dosen' => Request()->fc_kdusers_dosen
        ];

        $this->RegisterModel->addDataDetail($data_detail);

        return redirect()->route('mahasiswa')->with('pesan', 'Data Mahasiswa Berhasil Ditambahkan !!');
    }

    public function dosen(){
        return view('register.register_dosen');
    }

    public function insert_dosen(){
        //Jika ada data kosong
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Wajib Diisi!!',
            'email.required' => 'Wajib Diisi!!',
            'jurusan.required' => 'Wajib Diisi!!',
            'password.required' => 'Wajib Diisi!!',
            'password.min' => 'Min 8 Character'
        ]);

        $kode_user = $this->RegisterModel->get_max();
        //dd($kode_user);
        $urut = $kode_user->fc_kdusers;
       // dd($urut);
        $urut++;

        //$char = "ML";

        $kode = sprintf("%04s", $urut);

        $data = [
            'fc_kdusers' => $kode,
            'name' => Request()->name,
            'email' => Request()->email,
            'jurusan' => Request()->jurusan,
            'password' => Hash::make(Request()->password),
            'level' => 3,
            'fc_isi' => 'A',
        ];

        $this->RegisterModel->addData($data);

        $duration = $this->RegisterModel->get_duration();

        foreach($duration as $d){
            $data_duration = [
                'fn_id_jam' => $d->fn_id,
                'fc_kdusers_dosen' => $kode,
                'fv_keterangan' => 'In'
            ];

            $this->RegisterModel->addDuration($data_duration);
        }

        $availability = array(
            array('fc_kddays'=>'01', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'02', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'03', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'04', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'05', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'06', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'07', 'fc_kdjam'=> 'A', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'01', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'02', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'03', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'04', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'05', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'06', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
            array('fc_kddays'=>'07', 'fc_kdjam'=> 'B', 'fc_kdusers_dosen'=> $kode, 'fc_sts'=> '1'),
        );

        $this->RegisterModel->addAvailability($availability);

        return redirect()->route('dosen')->with('pesan', 'Data Dosen Berhasil Ditambahkan !!');
    }
}
