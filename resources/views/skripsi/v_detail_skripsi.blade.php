@extends('layouts.templateprofile')
@section('title','Skripsi')

@section('contentprofile')
<div class="container">
    <div class="row">
      <div class="col-lg-12" >
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

                        <div class="col-lg-6" >
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Dokumen Skripsi</h3>
                                </div>
                                <div class="card-body" >
                                    <div style="display:flex">
                                        <div class="col-sm-6" >
                                            <button type="button" class="btn btn-primary" onclick="lihat_p0()"><i class="fa fa-search"></i> Lihat</button>
                                        </div>
                                        <div class="col-sm-6" style="text-align: end;">
                                            <a href="{{ asset('doc') }}/{{ $status->fc_doc_p0 }}" class="btn btn-danger" target="blank"><i class="fa fa-download"></i> Download</a>
                                        </div>
                                    </div><br />
                                    <hr />
                                    <form id="form-selesai-p0" method="POST" action="/skripsi/finish_p0">
                                            <input type="hidden" name="fc_kdusers_mahasiswa" value="{{ $kode_mahasiswa }}">
                                            @if($count_log->log_count=="1")
                                            <button type="submit" id="btnUpdateP0" class="btn btn-danger">P0 Selesai</button>
                                            @else
                                            <button type="submit" class="btn btn-danger" disabled>P0 Selesai</button>
                                            @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" >
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

                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline" >
                    <div class="row">
                    <div class="col-lg-6" >
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Dokumen Skripsi</h3>
                            </div>
                            <div class="card-body" >
                                <div style="display:flex">
                                    <div class="col-sm-6" >
                                        <button type="button" class="btn btn-primary" onclick="lihat_p1()"><i class="fa fa-search"></i> Lihat</button>
                                    </div>
                                    <div class="col-sm-6" style="text-align: end;">
                                        <a href="{{ asset('doc') }}/{{ $status->fc_doc_p1 }}" class="btn btn-danger" target="blank"><i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div><br />
                                <hr />
                                <form id="form-selesai-p1" method="POST" action="/skripsi/finish_p1">
                                        <input type="hidden" name="fc_kdusers_mahasiswa" value="{{ $kode_mahasiswa }}">
                                        @if($count_log->log_count=="2" && $status->fc_sts_p0=="Y")
                                        <button type="submit" id="btnUpdateP1" class="btn btn-danger">P1 Selesai</button>
                                        @else
                                        <button type="submit" class="btn btn-danger" disabled>P1 Selesai</button>
                                        @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" >
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
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <div class="row">
                        <div class="col-lg-6" >
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Dokumen Skripsi</h3>
                                </div>
                                <div class="card-body" >
                                    <div style="display:flex">
                                        <div class="col-sm-6" >
                                            <button type="button" class="btn btn-primary" onclick="lihat_p2()"><i class="fa fa-search"></i> Lihat</button>
                                        </div>
                                        <div class="col-sm-6" style="text-align: end;">
                                            <a href="{{ asset('doc') }}/{{ $status->fc_doc_p2 }}" class="btn btn-danger" target="blank"><i class="fa fa-download"></i> Download</a>
                                        </div>
                                    </div><br />
                                    <hr />
                                    <form id="form-selesai-p2" method="POST" action="/skripsi/finish_p2">
                                            <input type="hidden" name="fc_kdusers_mahasiswa" value="{{ $kode_mahasiswa }}">
                                            @if($count_log->log_count=="3" && $status->fc_sts_p0=="Y" && $status->fc_sts_p1=="Y")
                                            <button type="submit" id="btnUpdateP2" class="btn btn-danger">P2 Selesai</button>
                                            @else
                                            <button type="submit" class="btn btn-danger" disabled>P2 Selesai</button>
                                            @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" >
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
                    </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
      </div>
    </div>
</div>

<div class="modal fade" id="doc_p0">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Dokumen P0</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
          <embed src="{{ asset('doc') }}/{{ $status->fc_doc_p0 }}" width="735" height="475" type="application/pdf">
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="doc_p1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Dokumen P1</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
          <embed src="{{ asset('doc') }}/{{ $status->fc_doc_p1 }}" width="735" height="475" type="application/pdf">
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="doc_p2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Dokumen P2</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
          <embed src="{{ asset('doc') }}/{{ $status->fc_doc_p2 }}" width="735" height="475" type="application/pdf">
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    var kode_mahasiswa =  "{{ $kode_mahasiswa }}";

    function lihat_p0(){
        $('#doc_p0').modal('show');
    }

    function lihat_p1(){
        $('#doc_p1').modal('show');
    }

    function lihat_p2(){
        $('#doc_p2').modal('show');
    }

    $(document).ready(function(){
        $('#form-selesai-p0').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnUpdateP0').text('saving...'); $('#btnUpdateP0').attr('disabled',true); },
                success: function(response) {
                    if(response.status) {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Mengupdate Data!",
                        icon: "success",
                        button: "Ok",
                        });
                    } else {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Mengupdate Data!",
                        icon: "success",
                        button: "Ok",
                        });
                    }
                },
                complete: function() { $('#btnUpdateP0').text('P0 Selesai'); $('#btnUpdateP0').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-selesai-p1').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnUpdateP1').text('saving...'); $('#btnUpdateP1').attr('disabled',true); },
                success: function(response) {
                    if(response.status) {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Mengupdate Data!",
                        icon: "success",
                        button: "Ok",
                        });
                    } else {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Mengupdate Data!",
                        icon: "success",
                        button: "Ok",
                        });
                    }
                },
                complete: function() { $('#btnUpdateP1').text('P1 Selesai'); $('#btnUpdateP1').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-selesai-p2').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnUpdateP2').text('saving...'); $('#btnUpdateP2').attr('disabled',true); },
                success: function(response) {
                    if(response.status) {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Mengupdate Data!",
                        icon: "success",
                        button: "Ok",
                        });
                    } else {
                        swal({
                        title: "Selamat!",
                        text: "Kamu Berhasil Mengupdate Data!",
                        icon: "success",
                        button: "Ok",
                        });
                    }
                },
                complete: function() { $('#btnUpdateP2').text('P2 Selesai'); $('#btnUpdateP2').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });
    })
</script>
@endsection
