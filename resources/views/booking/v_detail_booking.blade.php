@extends('layouts.template')
@section('title','Detail Booking')

@section('content')
<style>
    .sideActionsContainer {
        background: #fff;
        width: 100%;
        min-height: 100%;
        position: relative;
    }

    .bookingDetailsScreen .bookingDetails {
        padding: 26px;
    }

    .sideActionsContent {
        width: 70%;
        position: relative;
        -webkit-transition: height 0.3s, min-height 0.3s;
        -o-transition: height 0.3s, min-height 0.3s;
        transition: height 0.3s, min-height 0.3s;
    }

    .sideActionsContainer>* {
        overflow: hidden;
        vertical-align: top;
    }

    .bookingOptionPicker {
        float: right;
    }

    ._d1ib85 {
        position: relative !important;
        display: inline-block !important;
    }

    ._w7z36c {
        position: relative !important;
        z-index: 2 !important;
    }

    ._vmmvk6x {
        box-sizing: border-box !important;
        position: relative !important;
        font-family: roboto !important;
        cursor: pointer !important;
        padding: 0px !important;
        font-weight: 400 !important;
        transition: color 0.3s ease 0s, background 0.3s ease 0s !important;
        text-decoration: none !important;
        display: inline-block !important;
        font-size: 16px !important;
        border-style: solid !important;
        border-color: transparent rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.12) !important;
        border-width: 1px 0px !important;
        vertical-align: middle !important;
        height: auto !important;
        background: rgb(230, 235, 238) !important;
        color: rgb(35, 46, 53) !important;
        border-radius: 3px !important;
    }

    button {
        border: none;
        cursor: pointer;
        padding: 0 20px;
        font-weight: 400;
        -webkit-transition: color .3s ease, backgroundColor .3s ease;
        -o-transition: color .3s ease, backgroundColor .3s ease;
        transition: color .3s ease, backgroundColor .3s ease;
        text-decoration: none;
        display: inline-block;
        font-size: 1em;
        line-height: 2.25em;
        height: 2.25em;
        vertical-align: middle;
    }

    ._1y65shwz {
        display: block !important;
        padding: 0px 15px 0px 20px !important;
        line-height: 40px !important;
        height: 40px !important;
        font-size: 16px !important;
        margin: -1px !important;
        overflow: hidden !important;
    }

    ._1xxc2jjj {
        display: inline-block !important;
        vertical-align: middle !important;
        margin-left: 7px !important;
    }

    ._q2vo16 {
        vertical-align: middle !important;
        display: inline-block !important;
    }

    ._4v7wqu5 {
        position: absolute !important;
        z-index: 1 !important;
        top: 100% !important;
        width: 100% !important;
        right: 0px !important;
    }

    ._n08p03 {
        width: 100%;
        position: relative;
        z-index: 1;
    }

    ._t1yzy0r {
        position: absolute;
        box-shadow: rgb(0 0 0 / 30%) 0px 1px 7px;
        background: rgb(255, 255, 255);
        border-radius: 3px;
        z-index: -10;
        max-height: 0px;
        transform: translateY(-10px);
        overflow: hidden;
        opacity: 0;
        padding: 0px;
        top: 0px;
        right: 0px;
    }

    ._7p68a0 {
        padding: 8px 0px !important;
    }

    ._1cqrrdh {
        display: block !important;
        background-color: rgb(255, 255, 255) !important;
        font-size: 1em !important;
    }

    ._1t0ps9lc {
        display: block !important;
        width: 100% !important;
        padding: 0px !important;
        border: 0px !important;
        font-size: 1em !important;
        position: relative !important;
        background: rgb(255, 255, 255) !important;
    }

    ._ob2xadu {
        box-sizing: border-box !important;
        display: block !important;
        font-family: Roboto !important;
        font-weight: 400 !important;
        font-size: 1em !important;
        vertical-align: middle !important;
        height: 36px !important;
        line-height: 36px !important;
        text-align: left !important;
        padding: 0px 20px !important;
        cursor: pointer !important;
        transition: color 0.3s ease 0s, background 0.3s ease 0s !important;
        text-decoration: none !important;
        color: rgb(11, 113, 190) !important;
    }

    .bookingDetailsScreen h1 {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .bookingMetaHeader {
        display: inline-block;
        margin: 0 20px 10px 0;
        border-bottom: none;
        vertical-align: middle;
    }

    .bookingMetaHeader .bookingIcon {
        display: inline-block;
        -webkit-transform: translateY(-2px);
        -ms-transform: translateY(-2px);
        transform: translateY(-2px);
    }

    .bookingMetaHeader span {
        margin-right: 5px;
        font-weight: 400;
        /* vertical-align: top; */
    }

    ._q2vo16 {
        vertical-align: middle !important;
        display: inline-block !important;
    }

    .serverDate {
        text-transform: capitalize;
        font-size: 20px;
    }

    .bookingDetailsScreen .bookingDetails h2 {
        border-bottom: 1px solid #D4DBE0;
        padding-bottom: 10px;
        margin-top: 30px;
    }

    h2, .h2 {
        font-size: 1.625em;
    }

    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        font-family: "Roboto Condensed",KannadaSangamMN,Arial Narrow,Arial,sans-serif;
        font-weight: 300;
        color: #232E35;
        line-height: 1.2;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .bookingDetailsScreen .bookingFormDetails>div, .bookingDetailsScreen .bookingMetaValue {
        margin-bottom: 15px;
    }

    ._5y5ii59 {
        font-family: Roboto !important;
        font-weight: 400 !important;
        font-size: 16px !important;
        text-decoration: none !important;
        color: rgb(35, 46, 53) !important;
        display: inline !important;
        vertical-align: middle !important;
    }

    ._qzviln5 {
        box-sizing: border-box !important;
        position: relative !important;
        font-family: roboto !important;
        cursor: pointer !important;
        padding: 0px !important;
        font-weight: 400 !important;
        transition: color 0.3s ease 0s, background 0.3s ease 0s !important;
        text-decoration: none !important;
        display: inline-block !important;
        font-size: 16px !important;
        border-style: solid !important;
        border-width: 1px 0px !important;
        vertical-align: middle !important;
        height: auto !important;
        background: transparent !important;
        color: rgb(11, 113, 190) !important;
        border-color: transparent !important;
        border-radius: 3px !important;
    }

    ._7xrgrk7 {
        display: block !important;
        margin: -1px !important;
        overflow: hidden !important;
        line-height: 30px !important;
        height: 30px !important;
        font-size: 14px !important;
        padding: 0px 8px !important;
    }

    ._3k5jv3k {
        display: inline-block !important;
        vertical-align: middle !important;
        margin-right: 7px !important;
    }

    ._q2vo16 {
        vertical-align: middle !important;
        display: inline-block !important;
    }

    .bookingDetailsScreen .bookingDetails h2 {
        border-bottom: 1px solid #D4DBE0;
        padding-bottom: 10px;
        margin-top: 30px;
    }
    .bookingFormDetailKey, .bookingMetaKey {
        font-weight: 400;
    }

    .bookingDetailsScreen .bookingFormDetails>div, .bookingDetailsScreen .bookingMetaValue {
        margin-bottom: 15px;
    }

    .sideActionsContainer>*.sideActions {
        padding: 26px;
    }

    .sideActions {
        width: 30%;
        background-color: #ffffff;
        border-left: 1px solid #D4DBE0;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
    }

    .sideActions .bookingActions {
        width: 100%;
    }

    .sideActions .bookingActions .extraActions {
        width: 100%;
    }

    .bookingActions>* {
        clear: none;
        float: left;
        margin-left: 5px;
    }

    .sideActions .bookingActions .extraActions>a {
        display: block;
        border-bottom: 1px solid #D4DBE0;
        width: 100%;
        padding: 10px;
        font-weight: 400;
    }

    ._q2vo16 {
        vertical-align: middle !important;
        display: inline-block !important;
    }

    ._1a8vcgv {
        -webkit-box-direction: normal !important;
        -webkit-box-orient: vertical !important;
        border-left: 4px solid rgb(103, 158, 138) !important;
        padding-left: 20px !important;
        margin-bottom: 25px !important;
        display: flex !important;
        flex-direction: column !important;
    }

    ._1yry9975 {
        color: rgb(35, 46, 53);
        font-family: Roboto;
        margin: 0px;
        padding: 0px;
        font-size: 16px;
        line-height: 24px;
        font-weight: 400;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <a href="/bookings/notifikasi" class="btn btn-primary">Kembali</a><br /><br />
            <div class="card">
                <div class="card-body">
                    <div class="sideActionsContainer">
                        <div class="sideActionsContent bookingDetails">
                            <div class="bookingHeader" data-hj-masked="true">
                                <span class="bookingOptionPicker">
                                    <div class="clickout" style="display: inline-block;">
                                        <div class="_d1ib85">
                                            <div class="_w7z36c">

                                            </div>
                                            <div class="_4v7wqu5">
                                                <div class="_n08p03 undefined">
                                                    <div class="_t1yzy0r undefined" style="width: 224px; min-width: 180px;">
                                                        <div class="_7p68a0">
                                                            <div class="_1cqrrdh" data-testtype="selectlist" role="listbox">
                                                                <button class="_1t0ps9lc" role="option" aria-selected="false" value="rebook" data-testtype="option_rebook">
                                                                    <span class="_ob2xadu" tabindex="-1">
                                                                        <span>
                                                                        <span>Rebook</span>
                                                                        <span style="margin-left: 8px; transform: translateY(-1px); display: inline-block;">
                                                                            <a href="#/bookingDetails?id=ab99f66c-85f6-40cc-a723-e156167e8fd7&amp;profileId=88c76043-75fa-4643-b1f6-8bde6ba4dbb0" class="_nfn0bz">
                                                                            <span class="_34whg2h">Upgrade</span>
                                                                            </a>
                                                                        </span>
                                                                        </span>
                                                                    </span>
                                                                </button>
                                                                <button class="_1t0ps9lc" role="option" aria-selected="false" value="delete" data-testtype="option_delete"><span class="_ob2xadu" tabindex="-1">Delete</span></button>
                                                                <button class="_1t0ps9lc" role="option" aria-selected="false" value="noShow" data-testtype="option_noShow">
                                                                    <span class="_ob2xadu" tabindex="-1">
                                                                        <span>
                                                                            <span>Mark as no show</span>
                                                                            <span style="margin-left: 8px; transform: translateY(-1px); display: inline-block;">
                                                                                <a href="#/bookingDetails?id=ab99f66c-85f6-40cc-a723-e156167e8fd7&amp;profileId=88c76043-75fa-4643-b1f6-8bde6ba4dbb0" class="_nfn0bz"><span class="_34whg2h">Upgrade</span>
                                                                                </a>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </button>
                                                                <button class="_1t0ps9lc" role="option" aria-selected="false" value="timeline" data-testtype="option_timeline"><span class="_ob2xadu" tabindex="-1">Timeline</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                <h1><span class="bookingTitle">{{ $detail_booking->title }}</span> </h1>
                                <h3 class="bookingDate bookingMetaHeader">
                                    <span class="bookingIcon">
                                        <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                                            <svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M11 0c.5 0 1 .4 1 .9V1h2a2 2 0 012 2v11a2 2 0 01-2 2H2a2 2 0 01-2-2V3c0-1.1.9-2 2-2h2a1 1 0 012-.1V1h4c0-.6.4-1 1-1zm3 8H2v6h12V8zm-9 2a1 1 0 110 2 1 1 0 010-2zm3 0a1 1 0 110 2 1 1 0 010-2zm3 0a1 1 0 110 2 1 1 0 010-2zM4 3H2v3h12V3h-2v1c0 .5-.4 1-.9 1H11a1 1 0 01-1-.9V3H6v1c0 .5-.4 1-.9 1H5a1 1 0 01-1-.9V3z"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="serverDate">{{ \Carbon\Carbon::parse($detail_booking->start)->format('l jS \\of F Y h:i:s A') }} ({{ $detail_booking->fc_duration }})</span>
                                </h3>
                            </div>
                            <div class="bookingFormDetails">
                                <h2>Detail formulir pemesanan</h2>
                                <hr />
                                {{-- @foreach ($detail_question as $data)
                                <div>
                                    <span class="_5y5ii59">{{ $data->fv_label }}</span>
                                    <div class="bookingFormDetailValue">
                                        <span>{{ $data->fv_value }}</span>
                                    </div>
                                </div>
                                @endforeach --}}
                                <div>
                                    <span class="_5y5ii59"><b>Nama</b></span>
                                    <div class="bookingFormDetailValue">
                                        <span>{{ $detail_question->name }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="_5y5ii59"><b>Jurusan</b></span>
                                    <div class="bookingFormDetailValue">
                                        <span>{{ $detail_question->jurusan }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="_5y5ii59"><b>Email</b></span>
                                    <div class="bookingFormDetailValue">
                                        <span>{{ $detail_question->email }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="_5y5ii59"><b>Link Google Meet</b></span>
                                    <div class="bookingFormDetailValue">
                                        <span><a href="https://{{ $detail_question->fc_link_google_meet }}/" target="_blank">{{ $detail_question->fc_link_google_meet }}<a></span>
                                    </div>
                                </div>
                                <div>
                                    <span class="_5y5ii59"><b>Urgensi</b></span>
                                    <div class="bookingFormDetailValue">
                                        <span>{{ $detail_question->title }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="bookingMeta">
                                <h2>Detil tambahan</h2>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6">
                                        <div class="bookingMetaKey"><b>Referensi pemesanan:</b></div>
                                        <div class="bookingMetaValue">{{ $detail_booking->fc_kdbooking }}</div>
                                    </div>
                                    <div class="col-sm-4 col-xs-6">
                                        <div class="bookingMetaKey"><b>Judul pemesanan:</b></div>
                                        <div class="bookingMetaValue">{{ $detail_booking->title }}</div>
                                    </div>
                                    <div class="col-sm-4 col-xs-6">
                                        <div class="bookingMetaKey"><b>Dibuat di:</b></div>
                                        <div class="bookingMetaValue ">{{ \Carbon\Carbon::parse($detail_booking->created_at)->toDayDateTimeString() }}</div>
                                    </div>
                                    <div class="col-sm-4 col-xs-6">
                                        <div class="bookingMetaKey"><b>Waktu mulai pemesan:</b></div>
                                        <div class="bookingMetaValue">{{ \Carbon\Carbon::parse($detail_booking->start)->toDayDateTimeString() }}</div>
                                    </div>
                                    <div class="col-sm-4 col-xs-6">
                                        <div class="bookingMetaKey"><b>Waktu berakhir pemesan:</b></div>
                                        <div class="bookingMetaValue">{{ \Carbon\Carbon::parse($detail_booking->end)->toDayDateTimeString() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sideActions">
                            <div class="bookingActions">
                                <h2>Tindakan pemesanan</h2>
                                <div class="extraActions">
                                    @if ($detail_booking->fc_approve=='Y' || $detail_booking->fc_approve=='N')

                                    @else
                                    <a onclick="setujui({{ $detail_booking->id }})">
                                        <span style="margin-right: 10px; display: inline-block; transform: translateY(-1px);">
                                            <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                                                <svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M10.3.3a1 1 0 011.4 0l4 4c.4.4.4 1 0 1.4l-10 10a1 1 0 01-.7.3H1a1 1 0 01-1-1v-4c0-.3.1-.5.3-.7zM8 5.4l-6 6V14h2.6l6-6L8 5.4zm3-3L9.4 4 12 6.6 13.6 5 11 2.4z"></path></svg>
                                            </span>
                                        </span>
                                        Setujui
                                    </a>
                                    <a onclick="tolak({{ $detail_booking->id }})">
                                        <span style="margin-right: 10px; display: inline-block; transform: translateY(-1px);">
                                            <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                                                <svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M2.3 2.3a1 1 0 011.4 0L8 6.6l4.3-4.3a1 1 0 011.3 0h.1c.4.4.4 1 0 1.4L9.4 8l4.3 4.3c.4.4.4 1 0 1.3v.1a1 1 0 01-1.4 0L8 9.4l-4.3 4.3a1 1 0 01-1.3 0h-.1a1 1 0 010-1.4L6.6 8 2.3 3.7a1 1 0 010-1.3z"></path></svg>
                                            </span>
                                        </span>
                                        Tolak
                                    </a>
                                    @endif

                                    {{-- <a onclick="hapus({{ $detail_booking->id }})">
                                        <span style="margin-right: 10px; display: inline-block; transform: translateY(-1px);">
                                            <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                                                <svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8 0a2 2 0 011.7 1H13a3 3 0 013 3 2 2 0 01-1 1.7V14a2 2 0 01-2 2H3a2 2 0 01-2-2V5.7A2 2 0 010 4a3 3 0 013-3h3.3c.3-.6 1-1 1.7-1zm5 6H3v8h10V6zM8 7c.5 0 1 .4 1 .9V12a1 1 0 01-2 .1V8c0-.6.4-1 1-1zM5 7c.5 0 1 .4 1 .9V12a1 1 0 01-2 .1V8c0-.6.4-1 1-1zm6 0c.6 0 1 .4 1 1v4a1 1 0 01-2 0V8c0-.6.4-1 1-1zm2-4H3a1 1 0 00-1 1h12c0-.6-.4-1-1-1z"></path></svg>
                                            </span>
                                        </span>
                                        Hapus
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> You're about to delete the following booking:</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/bookings/delete_detail_booking" method="POST" >
        @csrf
        <input type="hidden" name="id" id="idbooking">
        <input type="hidden" name="kode_booking" id="kode_booking">
        <div class="modal-body">
            <div class="styledWrapper _1a8vcgv">
                <span class="_1yry9975">
                    <strong id="title"></strong>
                </span>
                <span class="_1yry9975" id="start"></span>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-outline-light btn-danger">Delete Booking</button>
        </div>
       </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="setujui_form">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Apakah Anda Menyetujui Booking Ini:</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/bookings/update_booking_terima" method="POST" >
        @csrf
        <input type="hidden" name="id" id="idbooking2">
        <input type="hidden" name="kode_booking" id="kode_booking2">
        <div class="modal-body">
            <div class="styledWrapper _1a8vcgv">
                <span class="_1yry9975">
                    <strong id="title2"></strong>
                </span>
                <span class="_1yry9975" id="start2"></span>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-outline-light btn-danger">Setujui</button>
        </div>
       </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="tolak_form">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Apakah Anda Menolak Booking Ini:</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/bookings/update_booking_tolak" method="POST" >
        @csrf
        <input type="hidden" name="id" id="idbooking3">
        <input type="hidden" name="kode_booking" id="kode_booking3">
        <div class="modal-body">
            <div class="styledWrapper _1a8vcgv">
                <span class="_1yry9975">
                    <strong id="title3"></strong>
                </span>
                <span class="_1yry9975" id="start3"></span>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-outline-light btn-danger">Tolak</button>
        </div>
       </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function hapus(id){
        $('#delete').modal('show');
        $.ajax({
		 url : "/bookings/getID2/"+id,
		 type: "GET",
		 dataType: "JSON",
		 success: function(result) {
          var tgl_book = moment(result.start, 'YYYY-MM-DD HH:II:SS').format('L LT');
          $('#idbooking').val(result.id);
          $('#kode_booking').val(result.fc_kdbooking);
		  $('#title').html(result.title);
		  $('#start').html(tgl_book+' ('+result.fc_duration+')');

		}, error: function (jqXHR, textStatus, errorThrown) {
		 alert('Error get data from ajax');
		}
	});
    }

    function setujui(id){
        $('#setujui_form').modal('show');
        $.ajax({
            url : "/bookings/getID2/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
            var tgl_book = moment(result.start, 'YYYY-MM-DD HH:II:SS').format('L LT');
            $('#idbooking2').val(result.id);
            $('#kode_booking2').val(result.fc_kdbooking);
            $('#title2').html(result.title);
            $('#start2').html(tgl_book+' ('+result.fc_duration+')');

            }, error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
            }
        });
    }

    function tolak(id){
        $('#tolak_form').modal('show');
        $.ajax({
            url : "/bookings/getID2/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
            var tgl_book = moment(result.start, 'YYYY-MM-DD HH:II:SS').format('L LT');
            $('#idbooking3').val(result.id);
            $('#kode_booking3').val(result.fc_kdbooking);
            $('#title3').html(result.title);
            $('#start3').html(tgl_book+' ('+result.fc_duration+')');

            }, error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>
@endsection
