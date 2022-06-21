@extends('layouts.template')
@section('title','Dashboard')

@section('content')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<style>
    input {
  border:solid 1px #ccc;
  border-radius: 5px;
  padding:7px 14px;
  margin-bottom:10px
}
input:focus {
  outline:none;
  border-color:#aaa;
}
.sort {
  padding:8px 30px;
  border-radius: 6px;
  border:none;
  display:inline-block;
  color:#fff;
  text-decoration: none;
  background-color: #28a8e0;
  height:40px;
}
.sort:hover {
  text-decoration: none;
  background-color:#1b8aba;
}
.sort:focus {
  outline:none;
}
.sort:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid transparent;
  content:"";
  position: relative;
  top:-10px;
  right:-5px;
}
.sort.asc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #fff;
  content:"";
  position: relative;
  top:13px;
  right:-5px;
}
.sort.desc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid #fff;
  content:"";
  position: relative;
  top:-10px;
  right:-5px;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

._xujj7ii {
    padding-bottom: 16px !important;
    position: relative !important;
    align-self: stretch !important;
    z-index: 0 !important;
    width: 32% !important;
}

._aq2k3kl {
    background: transparent !important;
    text-align: center !important;
    border: 2px dashed rgb(212, 219, 224) !important;
    cursor: pointer !important;
    width: 100% !important;
    min-height: 220px !important;
    height: 100% !important;
}

._12fqg6d6 {
    -webkit-box-direction: normal !important;
    -webkit-box-orient: vertical !important;
    -webkit-box-pack: center !important;
    -webkit-box-align: center !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-direction: column !important;
}

._fz3zdn {
    flex-shrink: 0 !important;
}

._7xsmdz {
    display: inline-block !important;
    width: 8px !important;
    height: 8px !important;
}

._nknw3xn {
    font-family: Roboto;
    margin: 0px;
    padding: 0px;
    font-size: 20px;
    line-height: 28px;
    font-weight: 400;
    color: rgb(11, 113, 190);
}

._1dqc4n5 {
    display: -webkit-box !important;
    -webkit-box-orient: vertical !important;
    overflow: hidden !important;
}

._q2vo16 {
    vertical-align: middle !important;
    display: inline-block !important;
}
</style>
<div class="container">
    <div class="row">

      <div class="col-lg-12" >
            <div class="form-group" style="display: flex;">
                {{-- <label for="inputEmail3" class="col-sm-3 control-label" >Jump To Date </label> --}}
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="tgl_1" value="" placeholder="Masukkan tanggal" autocomplete="off" />
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary" id="filter_all" >Tampilkan</button>
                </div>
            </div>
            <div id="idImgLoader" class="overlay" style="text-align: center"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>

      </div>
      <div  style="display:none;" id="view_booking"></div>
      {{-- <div class="col-sm">
        One of three columns
      </div>
      <div class="col-sm">
        One of three columns
      </div>
      <div class="col-sm">
        One of three columns
      </div> --}}








    </div>

</div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
<div class="modal fade" id="delete">
 <div class="modal-dialog modal-md">
   <div class="modal-content ">
     <div class="modal-header">
       <h4 class="modal-title" style="display: flex;"> Delete &nbsp;<div id="fc_title_booking"></div> ?</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>
     <form id="form-delete" action="/dashboard/delete_booking" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="fc_kdbooking" id="kode_booking">
     <div class="modal-body">
        <ul class="_1y7sy3w" style="background:rgb(244, 245, 247) !important;padding:20px 15px 10px !important">
            <li class="_dswvvi" style="margin-left: 20px !important;display: flex;">
                Booking page link - &nbsp;<div id="fc_booking_link"></div><strong></strong>
            </li>
            <li class="_dswvvi" style="margin-left: 20px !important;display: flex;">
                Was created on &nbsp;<div id="fd_date"></div><strong></strong>
            </li>
            <li class="_dswvvi" style="margin-left: 20px !important;display: flex;">
                Currently &nbsp;<div id="fc_sts"></div><strong>

                </strong>
            </li>
        </ul>
     </div>
     <div class="modal-footer justify-content-between">
       <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
       <button type="submit" class="btn btn-outline-light btn-danger">Yes, delete this booking page</button>
     </div>
    </form>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create your first booking page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-add" action="/dashboard/insert_booking" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Booking page title</label>
                            <input type="hidden" name="fc_kdusers" value="{{ Auth::user()->fc_kdusers }}">
                            <input type="text" name="title_book" class="form-control @error('title_book') is-invalid @enderror" value="{{ old('title_book') }}">
                            <div class="text-danger">
                                @error('title_book')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Booking page link</label>
                            <input type="text" name="page_link" class="form-control @error('page_link') is-invalid @enderror" value="{{ old('page_link') }}">
                            <div class="text-danger">
                                @error('page_link')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Booking page logo</label>
                            <input type="file" name="foto_logo" class="form-control @error('foto_logo') is-invalid @enderror" >
                            <div class="text-danger">
                                @error('foto_logo')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="btnSave" type="submit" class="btn btn-primary">Craete Booking Page</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<script>
var nama = "{{ Auth::user()->name }}";
$(document).ready(function(){
    $('#idImgLoader').fadeOut(3000);
	setTimeout(function(){
            data();
    }, 3000);

    $('#tgl_1').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    tampil_booking(0);

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
				if(response.status) { Batal(); tampil_booking();
				} else { Batal(); tampil_booking(); }
			},
			complete: function() { $('#btnSave').text('save'); $('#btnSave').attr('disabled',false); },
			cache: false, contentType: false, processData: false
		});
		return false;
	});

    $('#form-delete').submit(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

		e.preventDefault(); var formData = new FormData($(this)[0]);
		$.ajax({
			url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
			beforeSend: function() { $('#btnDelete').text('saving...'); $('#btnDelete').attr('disabled',true); },
			success: function(response) {
				if(response.status) { Batal2(); tampil_booking();
				} else { Batal2(); tampil_booking(); }
			},
			complete: function() { $('#btnDelete').text('save'); $('#btnDelete').attr('disabled',false); },
			cache: false, contentType: false, processData: false
		});
		return false;
	});
})

$("#filter_all").click(function () {
    tampil_booking($('#tgl_1').val());
});

function data(){
		$('#view_booking').fadeIn();
}

function Batal() {
		$('#modal-default').modal('hide');
}

function Batal2() {
		$('#delete').modal('hide');
}

function tampil_booking(tgl){
    var booking = '';
    var tambah_booking = '';
    var search = '';
    $.getJSON('/dashboard/load_booking/'+tgl, {
		format: "json"
	})
	.done(function (data) {
        if(data != ""){
		    $.each(data, function (key, val) {
                console.log('data',val);
                if(val.fv_logo !=null){
                   var img =  '<img src="images/'+val.fv_logo+'" class="brand-image img-circle elevation-3" style="opacity: .8;width: 71px;">';

                }else{
                    var img =  '<img src="AdminLTE/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8;width: 41px;">';
                }

                if(val.fc_sts == '1'){
                    var switch_box = 'onclick="update_aktif('+val.fn_id+')"';
                }else{
                    var switch_box = 'checked="" onclick="update_non_aktif('+val.fn_id+')"';
                }
                    booking += `
                             <div class="col-lg-4"  id="myUL">
                                <div class="card card-outline card-primary">
                                <div class="card-body">
                                <div class="col-sm-12" style=" display: inline-flex; ">
                                <div class="col-sm-4" >
                                   ${img}
                                </div>
                                <div class="col-sm-8" style="text-align: end;">
                                    <label class="switch">
                                        <input ${switch_box} type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                </div>
                                <p>
                                    <h5 class="title">${val.fc_title_booking}</h5>
                                    <h5 style="color: #1b8aba" class="link">${val.fc_booking_link}</h5>
                                </p>
                                <div class="modal-footer justify-content-between" style="padding: 0">
                                    <a href="/bookings/detail/${val.fc_kdbooking}" class="nav-link" style="padding: 0;">

                                        <p>
                                            <i class="nav-icon far fa-calendar-alt"></i>
                                        Booking

                                        </p>
                                    </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default"><i class="fa fa-cogs"></i>&nbsp;Edit</button>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="/dashboard/editProfile/${val.fc_kdbooking}"><i class="fa fa-cogs"></i>&nbsp;Edit Setting</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" onclick="hapus(${val.fn_id})">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>`;



		    });

        tambah_booking = `
          <div class="_xujj7ii" data-flip-config="{&quot;translate&quot;:true,&quot;scale&quot;:true,&quot;opacity&quot;:true}" data-flip-id="create" data-portal-key="portal" style="transform-origin: 0px 0px;">
                    <button type="button" class="_aq2k3kl" data-testid="createProfileItem" data-toggle="modal" data-target="#modal-default">
                      <div class="styledWrapper _12fqg6d6">
                        <div class="styledWrapper _fz3zdn">
                          <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                          <svg viewBox="0 0 16 16">
                            <path fill="#0B71BE" fill-rule="evenodd" d="M8 0c.6 0 1 .4 1 1v6h6c.5 0 1 .4 1 .9V8c0 .6-.4 1-1 1H9v6c0 .5-.4 1-.9 1H8a1 1 0 01-1-1V9H1a1 1 0 01-1-.9V8c0-.6.4-1 1-1h6V1c0-.5.4-1 .9-1z">
                            </path>
                          </svg>
                          </span>
                        </div>
                        <div class="styledWrapper _7xsmdz"></div>
                        <span class="_nknw3xn" style="max-width: 100%;">
                          <div class="_1dqc4n5" style="-webkit-line-clamp: 3;">create a new booking page</div>
                        </span>
                      </div>
                    </button>
                </div>
        `;

        search = `

        `;

        }else{
                    booking += `
                    <div class="card">
                    <div class="card-body">
                    <div class="lockscreen-logo">
                        <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 71px;">
                    </div>
                    <div class="lockscreen-name" style="text-align: center"><b><h2>Hey ${ nama },</h2></b></div>
                    <div style="text-align: center"><button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary" style="text-align: center">Start creating my first booking page</a></div>
                    </div>
                    </div>
                    `;

                    tambah_booking += ``;

                    search = ``;
        }
		   // okey += '</select></div></div>';
		                   // console.log(okey);
		    var f = document.getElementById("view_booking");
			f.innerHTML= search+booking+tambah_booking;
			document.getElementById('view_booking').style.display = "contents";
	})
}

function update_aktif(id){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
     });

    $.ajax ({

        url : "/dashboard/update_aktif/"+id,

        type: "POST",

        dataType: "JSON",

        success: function(data) {





            tampil_booking();

        }, error: function (jqXHR, textStatus, errorThrown) {

            tampil_booking();

        }

    });
}

function update_non_aktif(id){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
     });

    $.ajax ({

        url : "/dashboard/update_non_aktif/"+id,

        type: "POST",

        dataType: "JSON",

        success: function(data) {





            tampil_booking();

        }, error: function (jqXHR, textStatus, errorThrown) {

            tampil_booking();

        }

    });
}

function hapus(id){
    $('#delete').modal('show');
    $.ajax({
		 url : "/dashboard/getID/"+id,
		 type: "GET",
		 dataType: "JSON",
		 success: function(result) {
          if(result.fc_sts == '1'){
              var status = 'Offline';
          }else{
              var status = 'Online';
          }
          console.log('status', status);
		  $('#fc_title_booking').html(result.fc_title_booking);
		  $('#fd_date').html('<b>'+result.fd_date+'</b>');
          $('#fc_sts').html('<b>'+status+'</b>');
          $('#fc_booking_link').html('<b>'+result.fc_booking_link+'</b>');
          $('#kode_booking').val(result.fc_kdbooking);

		}, error: function (jqXHR, textStatus, errorThrown) {
		 alert('Error get data from ajax');
		}
	});
}
</script>
@endsection
