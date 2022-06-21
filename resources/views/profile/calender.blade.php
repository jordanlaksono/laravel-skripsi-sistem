@extends('layouts.templateprofile')
@section('title','Calender')

@section('contentprofile')
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
                <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="jadwal">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Booking</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">

                {{-- <input type="hidden" id="kode_booking" name="kode_booking" value="{{Request::segment(3)}}"> --}}
                {{-- <input type="hidden" id="tanggal" name="tanggal">
                <input type="hidden" id="tanggal_lengkap" name="tanggal_lengkap">
                <input type="hidden" id="jam_start" name="jam_start">
                <input type="hidden" id="kode_jam" name="kode_jam"> --}}
                <div class="row">
                    <div class="col-md-12">
                        <span id="view_jam"></span>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <span id="view_action"></span>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    var SITEURL = "{{url('/')}}";
    // var kode_booking = "{{ Request::segment(3) }}";
    var kode_dosen = '{{ Auth::user()->fc_kdusers }}';
    $(document).ready(function () {
     //   console.log('tanggal', new Date(y, m, 1));
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
            },

            navLinks: true,
            editable: true,
            events: "/calender/load_data/"+kode_dosen,
            defaultView: 'basicWeek',
            displayEventTime: false,
            eventRender: function (event, element, view) {

                // if (event.allDay === 'true') {
                //     event.allDay = true;
                // } else {
                //     event.allDay = false;
                // }
            },
            eventColor: '#378006',
            selectable: true,
            selectHelper: true,
            eventClick: function(event)
            {
                // var dt = moment(start, "YYYY-MM-DD HH:mm:ss").format('dddd');
                // var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                // var start_lengkap = moment(start, 'Y-MM-DD HH:mm:ss').format('YYYY-MM-DD HH:mm:ss');
                // $('#tanggal').val(start);
                // $('#tanggal_lengkap').val(start_lengkap);
                console.log('event', event.fc_kdbooking);
                $('#kode_booking').val(event.fc_kdbooking);
                $('#kode_booking2').val(event.fc_kdbooking);
                $('#jadwal').modal('show');
                var jam = '';
                var konf = '';
                var action = '';
                $.getJSON('/calender/load_booking/'+event.fc_kdbooking, {
                    format: "json"
                })
                .done(function (data) {
                    $.each(data, function (key, val) {

                        jam += `
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="fc_kdbooking" class="form-control" value="${val.fc_kdbooking}">
                                <input type="text" name="name" class="form-control" value="${val.name}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" value="${val.jurusan}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="${val.email}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Link Google meet</label>
                                <input type="text" name="link" class="form-control" value="${val.fc_link_google_meet}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Urgensi</label>
                                <textarea name="urgensi" class="form-control" readonly>${val.title}</textarea>
                            </div>

                        `;
                        if(val.fc_approve=='Y'){
                            konf = `
                            <div class="form-group">
                                <div class="alert alert-success alert-dismissible">

                                   Booking Disetujui
                                </div>
                            </div>
                            `;

                            action = ``;
                        }else if(val.fc_approve=='N'){
                            konf = `
                            <div class="form-group">
                                <div class="alert alert-danger alert-dismissible">

                                    Booking Ditolak
                                </div>
                            </div>
                            `;

                            action = ``;
                        }else{
                            konf = ``;

                            action = `
                            <form id="form-add" action="/calender/update_booking_tolak" method="POST" >
                            @csrf
                            <input type="hidden" name="kode_booking" id="kode_booking" value="${val.fc_kdbooking}">
                            <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                            <form id="form-add" action="/calender/update_booking_terima" method="POST" >
                            @csrf
                            <input type="hidden" name="kode_booking" id="kode_booking2" value="${val.fc_kdbooking}">
                            <button type="submit" class="btn btn-primary">Setujui</button>
                            </form>
                            `;
                        }

                    })


                    var f = document.getElementById("view_jam");
                    f.innerHTML= jam+konf;
                    document.getElementById('view_jam').style.display = "block";

                    var g = document.getElementById("view_action");
                    g.innerHTML= action;
                    document.getElementById('view_action').style.display = "contents";
                });
            }
        });
    });

    function cek_jam(id, jam, kode_jam){
        $("#tombol"+id).addClass('active');
        $('#jam_start').val(jam);
        $('#kode_jam').val(kode_jam);
    }
</script>
@endsection
