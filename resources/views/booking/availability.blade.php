@extends('layouts.templateprofile')
@section('title','Availability')

@section('contentprofile')
<style>
    ._r0471m {
        background: rgb(255, 255, 255) !important;
        border-radius: 4px !important;
    }

    ._1o6zkmdf {
        -webkit-box-pack: justify !important;
        -webkit-box-align: center !important;
        -webkit-box-direction: normal !important;
        -webkit-box-orient: horizontal !important;
        border: 1px solid rgb(212, 219, 224) !important;
        width: 100% !important;
        height: 48px !important;
        padding: 0px 14px !important;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: space-between !important;
        margin-top: 0px !important;
        border-top-left-radius: 4px !important;
        border-top-right-radius: 4px !important;
    }

    ._5kaapu {
        -webkit-box-align: center !important;
        display: flex !important;
        align-items: center !important;
    }

    ._z6ndsz {
        width: 104px !important;
        text-transform: capitalize !important;
    }

    ._3bgkm4t {
        position: relative !important;
        margin-bottom: 0px !important;
    }

    ._17rvje3d {
        -webkit-box-flex: 0 !important;
        vertical-align: middle !important;
        flex-grow: 0 !important;
        display: inline-block !important;
    }
    ._jro6t0 {
        display: flex !important;
    }
    ._1u9fru1 {
        display: none !important;
    }

    ._73y56rk {
        border: 1px solid rgb(11, 113, 190) !important;
        box-sizing: border-box !important;
        display: inline-block !important;
        position: relative !important;
        cursor: pointer !important;
        width: 18px !important;
        height: 18px !important;
        border-radius: 3px !important;
        vertical-align: middle !important;
        transition: border-color 0.3s ease 0s, background-color 0.3s ease 0s, -ms-transform 0.3s ease 0s, -webkit-transform 0.3s ease 0s, transform 0.3s ease 0s !important;
        transform: rotate(
    90deg
    ) !important;
        background-color: rgb(11, 113, 190) !important;
    }

    ._1o5dskv {
        position: absolute !important;
        top: 2px !important;
        left: 2px !important;
        opacity: 0 !important;
        z-index: -1 !important;
        width: 1px !important;
        height: 1px !important;
    }

    ._1ohsqff5 {
        box-sizing: border-box !important;
        position: absolute !important;
        width: 7px !important;
        height: 12px !important;
        border-width: 2px 0px 0px 2px !important;
        border-top-style: solid !important;
        border-left-style: solid !important;
        border-image: initial !important;
        border-bottom-style: initial !important;
        border-right-style: initial !important;
        transform: rotate(
    135deg
    ) !important;
        left: 3px !important;
        top: 2px !important;
        transition: border-color 0.3s ease 0s !important;
        background-color: transparent !important;
        border-color: white !important;
    }

    ._hq2s7h {
        display: inline-block !important;
        margin-left: 10px !important;
        vertical-align: middle !important;
        transform: translateY(1px) !important;
    }

    ._14rngo8 {
        font-family: Roboto !important;
        font-weight: 400 !important;
        font-size: 16px !important;
        display: inline-block !important;
    }

    ._11u89uyt {
        font-family: Roboto !important;
        font-weight: 400 !important;
        font-size: 16px !important;
        text-decoration: none !important;
        color: rgb(35, 46, 53) !important;
        display: inline !important;
        vertical-align: middle !important;
        cursor: pointer !important;
    }

    ._5kaapu {
        -webkit-box-align: center !important;
        display: flex !important;
        align-items: center !important;
    }

    ._1wvkp0b {
        width: 84px !important;
    }

    ._l0car3l {
        border: 1px solid rgb(212, 219, 224) !important;
        box-sizing: border-box !important;
        appearance: none !important;
        height: 40px !important;
        padding: 0px 8px !important;
        background: rgb(255, 255, 255) !important;
        font-family: Roboto !important;
        font-size: 16px !important;
        font-weight: 300 !important;
        line-height: 40px !important;
        color: rgb(35, 46, 53) !important;
        border-radius: 4px !important;
        text-align: center !important;
    }

    ._1uax8x0 {
        padding: 0px 4px !important;
    }

    ._1wvkp0b {
        width: 84px !important;
    }

</style>
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-tag"></i>
                        Update Availability
                        </h3>
                    </div>
                    <div class="card-body">
                    <div class="styledWrapper _r0471m">
                        @if(session('pesan'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{ session('pesan') }}
                                </div>
                        @endif
                        <form action="/bookings/update_sts_days" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="kode_booking" value="{{ $kode_booking }}"> --}}
                        @foreach ($day as $d)
                        <input type="hidden" name="fc_kddays[]" value="{{ $d->fc_kddays }}">
                        <input type="hidden" name="fn_availability[]" value="{{ $d->fn_availability }}">
                        <input type="hidden" name="sts[]" id="sts{{ $d->fn_availability }}" value="{{ $d->fc_sts }}">
                        <div class="styledWrapper _1o6zkmdf">

                            <div class="styledWrapper _5kaapu">
                                <div class="styledWrapper _z6ndsz">
                                    <div class="_3bgkm4t">
                                        <div class="_17rvje3d">
                                            <div class="_jro6t0">
                                                <span class="">
                                                    <div class="" style="width: 60px;">
                                                        {{-- <input type="checkbox" class="_1o5dskv" name="sun_active[]" id="sun_active_x1" > --}}
                                                        {{-- <div class="_1ohsqff5"></div> --}}
                                                        <div class="form-group">
                                                            <div class="form-check">

                                                                @if ($d->fc_sts == '1')
                                                                    <input class="form-check-input" type="checkbox" name="check[]" onclick="check('{{ $d->fn_availability }}')" id="checkId{{ $d->fn_availability }}" value="1" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" name="check[]" onclick="check('{{ $d->fn_availability }}')" id="checkId{{ $d->fn_availability }}" value="0">
                                                                @endif

                                                                <label class="form-check-label">{{ $d->fv_days}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                                <span class="_hq2s7h">
                                                    <span class="_14rngo8">
                                                        <label for="sun_active_x1" class="_11u89uyt">
                                                            <span class="_1nh4eon"></span>
                                                        </label>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="_1u9fru1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="styledWrapper _5kaapu">
                                    @foreach ($jam as $j)
                                    @if ($d->fc_kddays == $j->fc_kddays)
                                        <div class="styledWrapper _1wvkp0b" style="margin: 7px;">
                                            <input class="_l0car3l" name="sun_start_time" data-testid="sun_start_time" data-error="false" data-warning="false" value="{{ $j->ft_jam_start }}" style="width: 100%;">
                                        </div>
                                    @endif

                                    @endforeach

                                    {{-- <div class="styledWrapper _1uax8x0"> — </div>
                                    <div class="styledWrapper _1wvkp0b"><input class="_l0car3l" name="sun_end_time" data-testid="sun_end_time" data-error="false" data-warning="false" value="5:00 PM" style="width: 100%;"></div> --}}
                                </div>
                            </div>


                        </div>
                        @endforeach
                        <br />
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-xl btn-primary">All changes saved</button>
                        </div>
                        </form>
                    </div>
                    </div>
             </div>
    </div>
    </div>
</div>
<br />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-tag"></i>
                        Add Breaks
                        </h3>
                    </div>
                    <div class="card-body">
                        @if(session('pesan2'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            {{ session('pesan2') }}
                        </div>
                        @endif
                        <form action="/bookings/update_break/" method="POST" >
                        @csrf
                        {{-- <input type="hidden" name="kode_booking" value="{{ $kode_booking }}"> --}}
                        <div class="col-md-12" style="display: flex;">
                            <div class="col-md-6">
                                <label>Break </label>
                                @foreach ($time as $i)
                                <input type="hidden" name="fv_ket[]" id="fv_ket{{ $i->Id }}" value="{{ $i->fv_keterangan }}">
                                <input type="hidden" name="fn_id[]" id="fv_ket{{ $i->Id }}" value="{{ $i->Id }}">
                                <div class="form-check">
                                    @if ($i->fv_keterangan=="Break")
                                        <input class="form-check-input" type="checkbox" name="check[]" id="check_jam_start{{ $i->Id }}" onclick="check_start('{{ $i->Id }}')" value="Break" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="check[]" id="check_jam_start{{ $i->Id }}" onclick="check_start('{{ $i->Id }}')" value="">
                                    @endif

                                    <input class="_l0car3l" name="sun_start_time" data-testid="sun_start_time" data-error="false" data-warning="false" value="{{ $i->ft_jam_start }}" style="width: 42%;">
                                  </div>
                                @endforeach
                            </div>


                        </div>
                        <br />
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-xl btn-primary">All changes saved</button>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
function check(fc_kddays){
    //console.log('fc_kddays',fc_kddays);
    let inputs = document.getElementById('checkId'+fc_kddays);
    let sts = document.getElementById('sts'+fc_kddays);
    if (document.getElementById('checkId'+fc_kddays).checked) {
        sts.value = '1';
    }else{
        sts.value = '0';
    }
    console.log('inputs',inputs);
}

function check_start(fn_id){
    let inputs = document.getElementById('check_jam_start'+fn_id);
    let sts = document.getElementById('fv_ket'+fn_id);
    if (document.getElementById('check_jam_start'+fn_id).checked) {
        sts.value = 'Break';
    }else{
        sts.value = 'In';
    }
}
</script>
@endsection
