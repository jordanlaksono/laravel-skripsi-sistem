@extends('layouts.template')
@section('title','Calender Dosen')

@section('content')
<style>
    .gridSlot {
        display: table;
        width: 100%;
    }

    .gridSlot.gridDst, [dir] .gridSlot a, [dir] .gridSlot span {
        border-radius: 4px;
        border: 1px solid #679e8a;
        background-color: #fff;
        text-align: center;
        -webkit-transition: background-color .1s linear,color .1s linear,opacity .1s;
    }

    .gridSlot.gridDst, .gridSlot a, .gridSlot span {
        font-weight: 500;
        text-decoration: none;
        color: currentColor;
        -o-transition: background-color .1s linear,color .1s linear,opacity .1s;
        transition: background-color .1s linear,color .1s linear,opacity .1s;
    }

    :root {
        --card-line-height: 1.2em;
        --card-padding: 1em;
        --card-radius: 0.5em;
        --color-green: #558309;
        --color-gray: #e2ebf6;
        --color-dark-gray: #c4d1e1;
        --radio-border-width: 2px;
        --radio-size: 1.5em;
    }

    .grid {
        display: grid;
        grid-gap: var(--card-padding);
        margin: 0 auto;
        max-width: 60em;
        padding: 0;
    }
    @media (min-width: 42em) {
        .grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .card-input {
        background-color: #f2f8ff;
        border-radius: var(--card-radius);
        position: relative;
    }
    .card-input:hover {
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
    }

    .radio {
        font-size: inherit;
        margin: 0;
        position: absolute;
        right: calc(var(--card-padding) + var(--radio-border-width));
        top: calc(var(--card-padding) + var(--radio-border-width));
    }

    @supports (-webkit-appearance: none) or (-moz-appearance: none) {
        .radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #fff;
            border: var(--radio-border-width) solid var(--color-gray);
            border-radius: 50%;
            cursor: pointer;
            height: var(--radio-size);
            outline: none;
            transition: background 0.2s ease-out, border-color 0.2s ease-out;
            width: var(--radio-size);
        }
        .radio::after {
            border: var(--radio-border-width) solid #fff;
            border-top: 0;
            border-left: 0;
            content: "";
            display: block;
            height: 0.75rem;
            left: 25%;
            position: absolute;
            top: 50%;
            transform: rotate(45deg) translate(-50%, -50%);
            width: 0.375rem;
        }
        .radio:checked {
            background: var(--color-green);
            border-color: var(--color-green);
        }

        .card-input:hover .radio {
            border-color: var(--color-dark-gray);
        }
        .card-input:hover .radio:checked {
            border-color: var(--color-green);
        }
    }
    .plan-details {
        border: var(--radio-border-width) solid var(--color-gray);
        border-radius: var(--card-radius);
        cursor: pointer;
        display: flex;
        flex-direction: column;
        padding: var(--card-padding);
        transition: border-color 0.2s ease-out;
    }

    .card-input:hover .plan-details {
        border-color: var(--color-dark-gray);
    }

    .radio:checked ~ .plan-details {
        border-color: var(--color-green);
    }

    .radio:focus ~ .plan-details {
        box-shadow: 0 0 0 2px var(--color-dark-gray);
    }

    .radio:disabled ~ .plan-details {
        color: var(--color-dark-gray);
        cursor: default;
    }

    .radio:disabled ~ .plan-details .plan-type {
        color: var(--color-dark-gray);
    }

    .card-input:hover .radio:disabled ~ .plan-details {
        border-color: var(--color-gray);
        box-shadow: none;
    }

    .card-input:hover .radio:disabled {
        border-color: var(--color-gray);
    }

    .plan-type {
        color: var(--color-green);
        font-size: 1rem;
        font-weight: bold;
        line-height: 1em;
    }

    .plan-cost {
        font-size: 2.5rem;
        font-weight: bold;
        padding: 0.5rem 0;
    }

    .slash {
        font-weight: normal;
    }

    .plan-cycle {
        font-size: 2rem;
        font-variant: none;
        border-bottom: none;
        cursor: inherit;
        text-decoration: none;
    }

    .hidden-visually {
        border: 0;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <div class="card">
                <div class="card-body">
                @if(session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('pesan') }}
                    </div>
                @endif
                <br />

                <div id='calendar2'></div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="form">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Jadwal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-add" action="/dosen/insert_booking_confirm" method="POST" >
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">

                    <span id="view_form"></span>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <span id="footer"></span>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="jadwal">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Jadwal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        {{-- @csrf --}}
        <div class="modal-body">
            <form id="form-add-booking" action="/dosen/insert_booking_detail" method="POST" >
            <div id="jadwal_jam" style="display: flex;position: relative;flex-wrap: wrap;margin-right: -85px;margin-left: -15px;">
                {{-- <form id="form-add-booking" action="/dosen/insert_booking_detail" method="POST" > --}}
                    <input type="hidden" id="kode_user_mahasiswa" name="kode_user_mahasiswa" value="{{ Auth::user()->fc_kdusers }}">
                    <input type="hidden" id="kode_user_dosen" name="kode_user_dosen" value="{{$dosen->fc_kdusers}}">
                    <input type="hidden" id="kode_booking" name="kode_booking" value="{{ $kode_booking }}">
                    <input type="hidden" id="tanggal" name="tanggal">
                    <input type="hidden" id="tanggal_lengkap" name="tanggal_lengkap">
                    <input type="hidden" id="jam_start" name="jam_start">
                    <input type="hidden" id="kode_jam" name="kode_jam">

                    <span id="view_jam"></span>
                    <hr/><br />
                    <div class="form-group">

                        <button id="btnSave" type="submit" class="btn btn-primary" style="margin-left: 9px;">Create Booking</button>

                    </div>
                {{-- </form> --}}
            </div>
            </form>
            <form id="form-add-booking" action="/dosen/insert_booking_detail_confirm" method="POST" >
            @csrf
            <input type="hidden" name="start" id="start">
            <input type="hidden" name="end" id="end">
            <input type="hidden" name="fc_kdbooking" id="fc_kdbooking">
            <input type="hidden" name="fc_booking_start" id="fc_booking_start">
            <input type="hidden" name="fc_booking_end" id="fc_booking_end">
            <input type="hidden" name="fd_date_book" id="fd_date_book">
            <input type="hidden" name="fc_kdjam" id="fc_kdjam">
            <input type="hidden" name="created_at" id="created_at">
            <input type="hidden" name="kode_dosen" id="kode_dosen">
            <input type="hidden" name="kode_mahasiswa" id="kode_mahasiswa">
            <div id="form_booking" style="display: none;">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="fc_kdusers" class="form-control" value="{{ Auth::user()->fc_kdusers }}">
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ Auth::user()->jurusan }}" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Link Google meet</label>
                    <input type="text" name="link" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Urgensi</label>
                    <textarea name="urgensi" class="form-control" ></textarea>
                </div>
                <div class="form-group">

                    <button id="btnSave" type="submit" class="btn btn-primary" style="margin-left: 9px;">Create Booking</button>

                </div>
            </div>
            </form>
        </div>
        {{-- <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="btnSave" type="submit" class="btn btn-primary">Create Booking</button>
        </div> --}}

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    var SITEURL = "{{url('/')}}";
    var kode_user = "{{ $dosen->fc_kdusers }}";
    var kode_mahasiswa = "{{ Auth::user()->fc_kdusers }}";

    $(document).ready(function () {
        $('#form-add-booking').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            let fc_kode_booking = $('#kode_booking').val();
            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true); },
                success: function(response) {
                    if(response.status) { tampil_form_booking(fc_kode_booking);
                    } else { tampil_form_booking(fc_kode_booking); }
                },
                complete: function() { $('#btnSave').text('save'); $('#btnSave').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        var calendar = $('#calendar2').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
            },

            navLinks: true,
            editable: true,
            events: "/dosen/load_data/"+kode_user,
            defaultView: 'basicWeek',
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select:function(start, end, allDay)
            {
                var dt = moment(start, "YYYY-MM-DD HH:mm:ss").format('dddd');
                var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                var start_lengkap = moment(start, 'Y-MM-DD HH:mm:ss').format('YYYY-MM-DD HH:mm:ss');
                $('#tanggal').val(start);
                $('#tanggal_lengkap').val(start_lengkap);
                $('#jadwal').modal('show');
                var jam = '';
                $.getJSON('/dosen/load_jadwal/'+start+'/'+dt+'/'+kode_user, {
                    format: "json"
                })
                .done(function (data) {
                    $.each(data, function (key, val) {
                        console.log('start',start);
                        console.log('val.date',val.date);
                        var d = new Date(start);
                        var d2 = new Date(val.date);
                        if(val.date == start || val.fv_keterangan=='Break'){
                           // console.log('iki');
                            var style = "background: #28a745;color: white;";
                            var disabled = "disabled";
                            var disabled = "checked";
                        }else{
                            //console.log('startku',start);
                            var style = "";
                            var disabled = "";
                            var checked = "";
                        }

                        if(val.sts=='1'){
                            jam += `

                                <div class="col-md-4 col-sm-4 col-xs-12" >
                                    <label class="card-input">
                                        <input name="wkt-pemeriksaan" class="radio" type="radio" id="tombol${val.fn_id}" onclick="cek_jam('${val.fn_id}','${val.ft_jam_start}','${val.fc_kdjam}')" ${disabled} ${checked}>
                                        <span class="plan-details">
                                            <span class="mt-2 font-weight-bold" style="margin-top: 1.5rem!important;">${ val.ft_jam_start }</span>
                                        </span>
                                    </label>
                                </div> <br /><br /><br />
                            `;
                        }else{
                            jam += `

                                <label class="card-input">
                                    <input name="wkt-pemeriksaan" class="radio" type="radio" id="tombol${val.fn_id}" onclick="cek_jam('${val.fn_id}','${val.ft_jam_start}','${val.fc_kdjam}')" ${disabled} ${checked}>
                                    <span class="plan-details">
                                        <span class="mt-2 font-weight-bold" style="margin-top: 1.5rem!important;">${ val.ft_jam_start }</span>
                                    </span>
                                </label>
                                <br /><br /><br />
                            `;


                        }

                    })
                    var f = document.getElementById("view_jam");
                    f.innerHTML= jam;
                    document.getElementById('view_jam').style.display = "contents";
                });
            },

        });


    });

    function tampil_form_booking(kode_booking){
        $('#jadwal_jam').slideUp(500,'swing');
		$('#form_booking').fadeIn(1000);

        $.ajax({
				url : "/dosen/ajax_get_booking/"+kode_booking,
				type: "GET",
				dataType: "JSON",
				success: function(result) {
                    $('#start').val(result.start);
                    $('#end').val(result.end);
                    $('#fc_kdbooking').val(result.fc_kdbooking);
                    $('#fc_booking_start').val(result.fc_booking_start);
                    $('#fc_booking_end').val(result.fc_booking_end);
                    $('#fd_date_book').val(result.fd_date_book);
                    $('#fc_kdjam').val(result.fc_kdjam);
                    $('#created_at').val(result.created_at);
                    $('#kode_dosen').val(result.fc_kdusers_dosen);
                    $('#kode_mahasiswa').val(result.fc_kdusers_mahasiswa);

				}, error: function (jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
		});
    }

    // function cek_jam(id, jam){
    //     $("#tombol"+id).addClass('active');
    //     $('#jam_start').val(jam);
    // }

    function cek_jam(id, jam, kode_jam){
        $("#tombol"+id).addClass('active');
        $('#jam_start').val(jam);
        $('#kode_jam').val(kode_jam);
    }
</script>
@endsection
