@extends('layouts.template')
@section('title','Detail Skripsi')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('photo')}}/{{$detail_skripsi->photo}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $detail_skripsi->name }}</h3>

              <strong><i class="fas fa-book mr-1"></i> NIM</strong>

              <p class="text-muted">
                {{ $detail_skripsi->nim }}
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Jurusan</strong>

              <p class="text-muted">{{ $detail_skripsi->jurusan }}</p>

              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Judul Skripsi</strong>

              <p class="text-muted">
                {{ $detail_skripsi->judul_skripsi }}
              </p>

              <hr>


            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-primary card-outline" style="height: 377px;overflow-y: scroll;">
            <div class="card-header">
                <h3 class="card-title">Tahap Skripsi</h3>
            </div>
            <div class="card-body box-profile">

              <span id="view_log"></span>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>


        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">

                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">P 0 </a></li>
                @if(@$get_status_po->fc_sts_p0=="Y")
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">P 1</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="#timeline" >P 1</a></li>
                @endif
                @if(@$get_status_po->fc_sts_p1=="Y")
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">P 2</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="#settings" >P 2</a></li>
                @endif
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="activity">
                  <div class="row">


                  <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form P0</h3>
                        </div>
                        <div class="card-body">
                            @if(@$get_status_po->fc_sts_p0=="Y")
                              <div class="alert alert-success" role="alert">
                                P 0 Telah Disetujui!
                              </div>
                            @else
                            <form id="form-p0" action="/dosen/insert_doc_p0" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="kode_dosen" value="{{ $dosen->fc_kdusers }}">
                                <div class="form-group">
                                    <label>Doc P 0</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                        {{-- @if($get_check_po == 0)
                                            <span class="bg-danger">
                                                Belum Ada Dokumen
                                            </span>
                                        @endif --}}
                                        <span id="status_kosong_p0"></span>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="file" name="fc_doc_p0" class="form-control @error('fc_doc_p0') is-invalid @enderror" >
                                        <div class="text-danger">
                                            @error('fc_doc_p0')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button id="btnSaveP0" type="submit" class="btn btn-danger">Simpan DOC</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Publikasi</h3>
                        </div>
                        <div class="card-body">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-info"></i> Publikasi!</h5>
                            Dokumen Publikasi Jurnal Yang Di Upload Mahasiswa Ketika Mendaftar Semhas dan Ujian
                            <hr />
                            <h5><i class="icon fas fa-info"></i> Dokumen Akhir Skripsi!</h5>
                            Dokumen Dan Source Code Skripsi Yang Di Upload Mahasiswa Setelah Ujian Selesai Dilaksanakan Dokumen Skripsi Yang Di Upload , Sudah Melalui Proses Revisi(Jika Ada)
                        </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Log</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-add" action="/dosen/insert_log" method="POST">

                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Pembimbing</label>
                              <input type="hidden" name="kode_dosen" value="{{ $dosen->fc_kdusers }}">
                              <input type="text" class="form-control @error('pebimbing') is-invalid @enderror" value="{{ $dosen->name }}"  name="pebimbing">
                              <div class="text-danger">
                                @error('pebimbing')
                                    {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Kegiatan</label>
                              <input type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ old('tanggal_kegiatan') }}" name="tanggal_kegiatan">
                              <div class="text-danger">
                                @error('tanggal_kegiatan')
                                    {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Mulai</label>
                                  <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}" name="jam_mulai" >
                                  <div class="text-danger">
                                    @error('jam_mulai')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Selesai</label>
                                  <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}" name="jam_selesai" >
                                  <div class="text-danger">
                                    @error('jam_selesai')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                              </div>

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Lokasi / Ruang</label>
                              <input type="text" class="form-control @error('ruang') is-invalid @enderror" value="{{ old('ruang') }}" name="ruang">
                              <div class="text-danger">
                                @error('ruang')
                                    {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Uraian</label>
                              <textarea class="form-control @error('uraian') is-invalid @enderror" value="{{ old('uraian') }}" rows="3" placeholder="Enter ..." name="uraian"></textarea>
                              <div class="text-danger">
                                @error('ruang')
                                    {{ $message }}
                                @enderror
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button id="btnSave" type="submit" class="btn btn-primary">Simpan Log</button>
                          </div>
                        </form>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Form P1</h3>
                                </div>
                                <div class="card-body">
                                    @if(@$get_status_po->fc_sts_p1=="Y")
                                        <div class="alert alert-success" role="alert">
                                        P 1 Telah Disetujui!
                                        </div>
                                    @else
                                    <form id="form-p1" action="/dosen/insert_doc_p1" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="kode_dosen" value="{{ $dosen->fc_kdusers }}">
                                        <div class="form-group">
                                            <label>Doc P 1</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                <span id="status_kosong_p1"></span>
                                                </div>
                                                <div class="col-md-6">
                                                <input type="file" name="fc_doc_p1" class="form-control @error('fc_doc_p1') is-invalid @enderror" >
                                                <div class="text-danger">
                                                    @error('fc_doc_p1')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button id="btnSaveP1" type="submit" class="btn btn-danger">Simpan DOC</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                       </div>

                      <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Publikasi</h3>
                            </div>
                            <div class="card-body">
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Publikasi!</h5>
                                Dokumen Publikasi Jurnal Yang Di Upload Mahasiswa Ketika Mendaftar Semhas dan Ujian
                                <hr />
                                <h5><i class="icon fas fa-info"></i> Dokumen Akhir Skripsi!</h5>
                                Dokumen Dan Source Code Skripsi Yang Di Upload Mahasiswa Setelah Ujian Selesai Dilaksanakan Dokumen Skripsi Yang Di Upload , Sudah Melalui Proses Revisi(Jika Ada)
                            </div>
                            </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Log</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="form-add-log" action="/dosen/insert_log" method="POST">

                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Pembimbing</label>
                                  <input type="hidden" name="kode_dosen" value="{{ $dosen->fc_kdusers }}">
                                  <input type="text" class="form-control @error('pebimbing') is-invalid @enderror" value="{{ $dosen->name }}"  name="pebimbing">
                                  <div class="text-danger">
                                    @error('pebimbing')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Kegiatan</label>
                                  <input type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ old('tanggal_kegiatan') }}" name="tanggal_kegiatan">
                                  <div class="text-danger">
                                    @error('tanggal_kegiatan')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Mulai</label>
                                      <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}" name="jam_mulai" >
                                      <div class="text-danger">
                                        @error('jam_mulai')
                                            {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Selesai</label>
                                      <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}" name="jam_selesai" >
                                      <div class="text-danger">
                                        @error('jam_selesai')
                                            {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Lokasi / Ruang</label>
                                  <input type="text" class="form-control @error('ruang') is-invalid @enderror" value="{{ old('ruang') }}" name="ruang">
                                  <div class="text-danger">
                                    @error('ruang')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Uraian</label>
                                  <textarea class="form-control @error('uraian') is-invalid @enderror" value="{{ old('uraian') }}" rows="3" placeholder="Enter ..." name="uraian"></textarea>
                                  <div class="text-danger">
                                    @error('ruang')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer">
                                <button id="btnSaveLog" type="submit" class="btn btn-primary">Simpan Log</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Form P2</h3>
                                </div>
                                <div class="card-body">
                                    @if(@$get_status_po->fc_sts_p2=="Y")
                                        <div class="alert alert-success" role="alert">
                                        P 2 Telah Disetujui!
                                        </div>
                                    @else
                                    <form id="form-p2" action="/dosen/insert_doc_p2" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="kode_dosen" value="{{ $dosen->fc_kdusers }}">
                                        <div class="form-group">
                                            <label>Doc P 2</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                <span id="status_kosong_p2"></span>
                                                </div>
                                                <div class="col-md-6">
                                                <input type="file" name="fc_doc_p2" class="form-control @error('fc_doc_p2') is-invalid @enderror" >
                                                <div class="text-danger">
                                                    @error('fc_doc_p2')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button id="btnSaveP2" type="submit" class="btn btn-danger">Simpan DOC</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Publikasi</h3>
                                </div>
                                <div class="card-body">
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> Publikasi!</h5>
                                    Dokumen Publikasi Jurnal Yang Di Upload Mahasiswa Ketika Mendaftar Semhas dan Ujian
                                    <hr />
                                    <h5><i class="icon fas fa-info"></i> Dokumen Akhir Skripsi!</h5>
                                    Dokumen Dan Source Code Skripsi Yang Di Upload Mahasiswa Setelah Ujian Selesai Dilaksanakan Dokumen Skripsi Yang Di Upload , Sudah Melalui Proses Revisi(Jika Ada)
                                </div>
                                </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Log</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="form-add-log2" action="/dosen/insert_log" method="POST">

                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Pembimbing</label>
                                  <input type="hidden" name="kode_dosen" value="{{ $dosen->fc_kdusers }}">
                                  <input type="text" class="form-control @error('pebimbing') is-invalid @enderror" value="{{ $dosen->name }}"  name="pebimbing">
                                  <div class="text-danger">
                                    @error('pebimbing')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Kegiatan</label>
                                  <input type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ old('tanggal_kegiatan') }}" name="tanggal_kegiatan">
                                  <div class="text-danger">
                                    @error('tanggal_kegiatan')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Mulai</label>
                                      <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}" name="jam_mulai" >
                                      <div class="text-danger">
                                        @error('jam_mulai')
                                            {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Selesai</label>
                                      <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}" name="jam_selesai" >
                                      <div class="text-danger">
                                        @error('jam_selesai')
                                            {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Lokasi / Ruang</label>
                                  <input type="text" class="form-control @error('ruang') is-invalid @enderror" value="{{ old('ruang') }}" name="ruang">
                                  <div class="text-danger">
                                    @error('ruang')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Uraian</label>
                                  <textarea class="form-control @error('uraian') is-invalid @enderror" value="{{ old('uraian') }}" rows="3" placeholder="Enter ..." name="uraian"></textarea>
                                  <div class="text-danger">
                                    @error('ruang')
                                        {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer">
                                <button id="btnSaveLog2" type="submit" class="btn btn-primary">Simpan Log</button>
                              </div>
                            </form>
                        </div>
                      </div>

                    </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <script>
      var kode_dosen = "{{ $dosen->fc_kdusers }}";
      var kode_mahasiswa = "{{ Auth::user()->fc_kdusers }}";

      $(document).ready(function(){
        get_status_doc1(kode_dosen, kode_mahasiswa);
        tampil_log();
        $('#form-add').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true); },
                success: function(response) {
                    if(response.status) {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Log!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-add").reset();
                    } else {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Log!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-add").reset(); }
                },
                complete: function() { $('#btnSave').text('save'); $('#btnSave').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-add-log').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSaveLog').text('saving...'); $('#btnSaveLog').attr('disabled',true); },
                success: function(response) {
                    if(response.status) {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Log!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-add-log").reset();
                    } else {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Log!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-add-log").reset(); }
                },
                complete: function() { $('#btnSaveLog').text('save'); $('#btnSaveLog').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-add-log2').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSaveLog2').text('saving...'); $('#btnSaveLog2').attr('disabled',true); },
                success: function(response) {
                    if(response.status) {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Log!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-add-log").reset();
                    } else {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Log!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-add-log").reset(); }
                },
                complete: function() { $('#btnSaveLog2').text('save'); $('#btnSaveLog2').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-p0').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSaveP0').text('saving...'); $('#btnSaveP0').attr('disabled',true); },
                success: function(response) {

                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Dokumen P0!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-p0").reset();
                        get_status_doc1(kode_dosen, kode_mahasiswa)
                        tampil_log()

                },
                complete: function() { $('#btnSaveP0').text('Simpan DOC'); $('#btnSaveP0').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-p1').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSaveP1').text('saving...'); $('#btnSaveP1').attr('disabled',true); },
                success: function(response) {

                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Dokumen P1!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-p1").reset();
                        get_status_doc1(kode_dosen, kode_mahasiswa)
                        tampil_log()

                },
                complete: function() { $('#btnSaveP1').text('Simpan DOC'); $('#btnSaveP1').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-p2').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSaveP2').text('saving...'); $('#btnSaveP2').attr('disabled',true); },
                success: function(response) {

                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Menyimpan Dokumen P2!",
                        icon: "success",
                        button: "Ok",
                        });
                        document.getElementById("form-p2").reset();
                        get_status_doc1(kode_dosen, kode_mahasiswa)
                        tampil_log()

                },
                complete: function() { $('#btnSaveP2').text('Simpan DOC'); $('#btnSaveP2').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });
      })

      function get_status_doc1(kode_dosen, kode_mahasiswa){
        $.ajax({
          url : "/dosen/getCheckStatusP0/"+kode_dosen +"/"+kode_mahasiswa,
          type: "GET",
          dataType: "JSON",
          success: function(result2) {
            if(result2.fc_sts_p0=="S"){
              $('#status_kosong_p0').html(' <span class="bg-primary">  Pending </span>');
            }else if(result2.fc_sts_p0=="N"){
               $('#status_kosong_p0').html(' <span class="bg-danger">  Ditolak </span>');
            }else if(result2.fc_sts_p0=="Y"){
              $('#status_kosong_p0').html(' <span class="bg-success">  Diterima </span>');
            }else{
              $('#status_kosong_p0').html('<span class="bg-danger">  Belum Ada Dokumen </span>');
            }

            if(result2.fc_sts_p1=="S"){
              $('#status_kosong_p1').html(' <span class="bg-primary">  Pending </span>');
            }else if(result2.fc_sts_p1=="N"){
               $('#status_kosong_p1').html(' <span class="bg-danger">  Ditolak </span>');
            }else if(result2.fc_sts_p1=="Y"){
              $('#status_kosong_p1').html(' <span class="bg-success">  Diterima </span>');
            }else{
              $('#status_kosong_p1').html('<span class="bg-danger">  Belum Ada Dokumen </span>');
            }

            if(result2.fc_sts_p2=="S"){
              $('#status_kosong_p2').html(' <span class="bg-primary">  Pending </span>');
            }else if(result2.fc_sts_p2=="N"){
               $('#status_kosong_p2').html(' <span class="bg-danger">  Ditolak </span>');
            }else if(result2.fc_sts_p2=="Y"){
              $('#status_kosong_p2').html(' <span class="bg-success">  Diterima </span>');
            }else{
              $('#status_kosong_p2').html('<span class="bg-danger">  Belum Ada Dokumen </span>');
            }


          }, error: function (jqXHR, textStatus, errorThrown) {
              alert('Error get data from ajax');
          }
        });
      }

      function tampil_log(){
          var log = '';
          $.getJSON('/dosen/load_log/'+kode_mahasiswa, {
            format: "json"
          })
          .done(function (data) {
            $.each(data, function (key, val) {
              if(val.status_log=="Diproses"){
                var color = "gray";
              }else if(val.status_log=="Disetujui"){
                var color = "green";
              }else{
                var color = "red";
              }
              log += `
                  <div class="callout callout-info">
                    <p style="color:${color}"><i class"ace-icon fa fa-asterisk">${val.status_log}</i><p>
                    <h5>${val.log}</h5>
                </div>
              `
            })
            var f = document.getElementById("view_log");
            f.innerHTML= log;
            document.getElementById('view_log').style.display = "contents";
          })
      }
  </script>
@endsection
