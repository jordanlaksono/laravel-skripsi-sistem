<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->char('fc_nim',30);
            $table->char('fc_ktp',30);
            $table->string('fv_nmmahasiswa',100);
            $table->string('fv_tmplahir',20);
            $table->date('fd_tgllahir');
            $table->char('fc_jnskelamin',1);
            $table->char('fc_goldarah',1);
            $table->char('fc_angkatan',10);
            $table->char('fc_email',50);
            $table->string('fv_alamat');
            $table->char('fc_telp',50);
            $table->string('f_foto');
            $table->string('f_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
