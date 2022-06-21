@extends('layouts.templateprofile')
@section('title','Notifikasi')

@section('contentprofile')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<style>
    div.bookingsContainer {
        position: relative;
        /* padding: 11px 30px; */
    }

    .whitePod {
        background: #ffffff;
        padding: 30px;
        margin: 7px;
    }

    * {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .bookingResultList {
        position: relative;
        z-index: 2;
    }

    .ycbmBookingTable .bookingSeparator.bookingTodayTag, .ycbmBookingTable .bookingSeparator.bookingSeparatorToday {
        text-align: center;
    }

    .ycbmBookingTable .bookingSeparator {
        border-top: #D4DBE0 1px solid;
        border-bottom: #D4DBE0 1px solid;
        margin-top: -1px;
    }

    .ycbmBookingTable .bookingSeparator.bookingTodayTag .separatorLabel, .ycbmBookingTable .bookingSeparator.bookingSeparatorToday .separatorLabel {
        background: #BFC4C8;
        padding: 2px 10px;
        border-radius: 3px;
        color: #fff;
        position: relative;
        z-index: 1;
    }

    .ycbmBookingTable .bookingSeparator div {
        padding: 9px;
        position: relative;
        background-color: #D4DBE0;
        background-image: -o-repeating-linear-gradient(135deg, transparent, #fff 1px, #fff 6px, transparent 7px);
        background-image: repeating-linear-gradient(
    -45deg
    , transparent, #fff 1px, #fff 6px, transparent 7px);
    }
    .ycbmBookingTable .bookingItem.showProfile {
        padding-left: 370px;
    }

    .ycbmBookingTable .bookingItem.booking_past {
        background: #F4F5F7;
    }

    .ycbmBookingTable .bookingItem {
        position: relative;
        border-top: #D4DBE0 1px solid;
        border-bottom: #D4DBE0 1px solid;
        margin-top: -1px;
        padding-top: 65px;
        padding-bottom: 17px;
        padding-right: 210px;
        padding-left: 230px;
        -webkit-transition: background 5s, opacity .5s;
        -o-transition: background 5s, opacity .5s;
        transition: background 5s, opacity .5s;
    }

    .ycbmBookingTable .bookingItem .bookingProfile {
        width: 140px;
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
    }

    .ycbmBookingTable .bookingItem>div {
        float: left;
        padding-left: 15px;
        padding-right: 15px;
    }

    .ycbmBookingTable .bookingItem .bookingProfile>span {
        position: absolute;
        top: 50%;
        left: 10px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .bookingProfile .bookingName {
        max-width: 130px;
        display: block;
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
    }

    .ycbmBookingTable .bookingItem.booking_past .bookingItemData {
        font-weight: 300;
    }

    .bookingItemMeta {
        font-size: .85em;
        color: #889196;
        font-weight: 300;
    }

    .bookingItemData {
        font-weight: 400;
    }

    .ycbmBookingTable .bookingItem .bookingProfile+.bookingDate {
        width: 240px;
        position: absolute;
        left: 140px;
        top: 0;
        height: 100%;
    }

    .ycbmBookingTable .bookingItem>div {
        float: left;
        padding-left: 15px;
        padding-right: 15px;
    }

    .ycbmBookingTable .bookingItem .bookingProfile+.bookingDate>div {
        position: absolute;
        top: 50%;
        left: 10px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .ycbmBookingTable .bookingItem.booking_past .bookingItemData {
        font-weight: 300;
    }

    .serverDate {
        text-transform: capitalize;
    }

    .bookingItemMeta {
        font-size: .85em;
        color: #889196;
        font-weight: 300;
    }

    .ycbmBookingTable .bookingItem.showMeta .bookingTitle {
        width: 55%;
    }

    .ycbmBookingTable .bookingItem>div {
        float: left;
        padding-left: 15px;
        padding-right: 15px;
    }

    a {
        cursor: pointer;
        color: #0B71BE;
        text-decoration: none;
    }

    .ycbmBookingTable .bookingItem.booking_past .bookingItemData {
        font-weight: 300;
    }

    .bookingItemMeta {
        font-size: .85em;
        color: #889196;
        font-weight: 300;
    }

    .serverDate {
        text-transform: capitalize;
    }
    .ycbmBookingTable .bookingItem.showMeta .bookingMeta {
        width: 45%;
    }

    .ycbmBookingTable .bookingItem>div {
        float: left;
        padding-left: 15px;
        padding-right: 15px;
    }

    .ycbmBookingTable .bookingItem .bookingStatus {
        position: absolute;
        right: 130px;
        top: 50%;
        margin-top: -10px;
        text-align: center;
        width: 80px;
        padding: 0;
    }

    .ycbmBookingTable .bookingItem>div {
        float: left;
        padding-left: 15px;
        padding-right: 15px;
    }

    .ycbmBookingTable .bookingItem .bookingOptions {
        position: absolute;
        right: 10px;
        top: 0;
        height: 100%;
        width: 140px;
    }

    .ycbmBookingTable .bookingItem .bookingOptions>div {
        position: absolute;
        top: 50%;
        right: 0;
        margin-top: -13px;
    }

    .bookingActions>* {
        clear: none;
        float: left;
        margin-left: 5px;
    }
</style>
<div class="modal fade bs-example-modal-sm" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <center><img src="{{asset('AdminLTE')}}/dist/img/loader-dark.gif"></center>
      </div>
    </div>
</div>

<div class="modal bs-example-modal-sm" id="loading" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <center>
        <div class="modal-dialog modal-sm" role="document" style="margin-top: 17%;     ">
          <div class="modal-content" style="width: 22%;" >
                 <img src="{{asset('AdminLTE')}}/dist/img/loader-dark.gif">
                 <p>Loading</p>
          </div>
        </div>
    </center>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <form class="form-horizontal">
                <div style="flex: 1; display: flex; flex-direction: column;">


                  <div class="form-group" style="display: flex;">
                    <label for="inputEmail3" class="col-sm-3 control-label" >Jump To Date </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tgl_1" value="" placeholder="Masukkan tanggal" autocomplete="off" />
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-primary" id="filter_all" >Tampilkan</button>
                    </div>
                  </div>
                </div>
            </form>
            @if(session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('pesan') }}
                    </div>
            @endif
            <div class="whitePod bookingsContainer">
                <div class="bookingResults">
                    <div class="bookingResultList ycbmBookingTable">
                        <div class="bookingSeparator bookingSeparatorToday">
                            <div><span class="separatorLabel">List Booking</span></div>
                        </div>
                        <div id="load_booking"></div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
<script>
    var tgl_1 = $('#tgl_1').val();
    var kode_user = '{{ Auth::user()->fc_kdusers }}';
    $(document).ready(function () {
        //Date range picker
        //$('#loading').modal('show');
            $('#tgl_1').datepicker({
              format: "yyyy-mm-dd",
              autoclose: true
            });

            orde_tgl(0);

    });

    $("#filter_all").click(function () {
        orde_tgl($('#tgl_1').val());
    });

    function orde_tgl(tgl){
        $('#loading').modal('show');
        var booking = '';
        $.getJSON('/bookings/load_booking_all/'+tgl+'/'+kode_user, {
            format: "json"
        })
        .done(function (data) {
            $('#loading').modal('hide');
            $.each(data, function (key, val) {
                var now = moment(val.fd_date_book, 'YYYY-MM-DD').format('DD.MM.YYYY');
                var tgl_book = moment(val.start, 'YYYY-MM-DD HH:II:SS').format('L LT');
               // var dateformat = dateformat(now, 'dddd, mmmm dS, yyyy, h:MM:ss TT')

                if(val.fc_approve == 'Y'){
                    var button = '<a href="#" class="btn btn-success" >Disetujui</a>';
                }else if(val.fc_approve == 'N'){
                    var button = '<a href="#" class="btn btn-danger" >Ditolak</a>';
                }else{
                    var button = '';
                }

                booking += `
                        <div class="bookingItem booking_accepted booking_past showMeta showProfile">
                            <div class="bookingProfile">
                                <span class="bookingName" alt="edwinlaksono12-0" title="edwinlaksono12-0">
                                    <span class="bookingItemData">Title: </span>
                                    <br><span class="bookingItemMeta">${val.title}</span>
                                </span>
                            </div>
                            <div class="bookingDate">
                                <div>
                                    <span class="bookingItemData serverDate">${now}</span>
                                    <br><span class="bookingItemMeta"><span>Duration:</span> ${val.fc_duration}</span>
                                </div>
                            </div>
                            <div class="bookingTitle" style="
                            padding-top: -45px;
                            width: 255px;
                            position: absolute;
                            left: 345px;
                            top: 17px;
                            height: 100%;
                        ">

                                <span class="bookingItemMeta">Booking made on <span class="serverDate">${tgl_book}</span></span>
                            </div>
                            <div class="bookingMeta"></div>
                            <div class="bookingStatus"><a href="/bookings/bookingsDetail/${val.fc_kdbooking}" class="btn btn-primary" >Detail</a></div>
                            <div class="bookingOptions">
                                <div class="bookingActions">
                                    <div>
                                        ${button}
                                    </div>
                                </div>
                            </div>
                        </div>
                `;
            })
            var f = document.getElementById("load_booking");
            f.innerHTML= booking;
            document.getElementById('load_booking').style.display = "block";
        })
    }
</script>
@endsection
