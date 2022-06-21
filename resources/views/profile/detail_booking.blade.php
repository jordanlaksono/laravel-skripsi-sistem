@extends('layouts.templateprofile')
@section('title','Confirm Booking')

@section('contentprofile')
<style>
   .bookingInfo {
        background-color: #fff;
        border-radius: 4px;
        padding: 16px;
        margin-bottom: 32px;
        margin-top: 16px;
    }

    .bookingDate, .bookingTime {
        margin-bottom: 8px;
    }

    .bookingTimezone {
        padding-left: 24px;
        background-position: 0 0;
    }

    .bookingInfo {
        color: #333;
        position: relative;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6" >
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-tag"></i>
                      Confirm Booking
                    </h3>
                </div>
                <div class="card-body" >
                    <div class="col-md-8 col-sm-12 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">{{ $det_booking->fd_date_book }}</span>
                            <span class="info-box-number">{{ $det_booking->fc_booking_start }} - {{ $det_booking->fc_booking_end }}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/calender/insert_konfirm_booking" method="POST" >
                            @csrf
                            <input type="hidden" name="start" value="{{ $det_booking->start }}">
                            <input type="hidden" name="end" value="{{ $det_booking->end }}">
                            <input type="hidden" name="fc_kdbooking" value="{{ $det_booking->fc_kdbooking }}">
                            <input type="hidden" name="fc_kddetbooking" value="{{ $det_booking->fc_kddetbooking }}">
                            <input type="hidden" name="fc_booking_start" value="{{ $det_booking->fc_booking_start }}">
                            <input type="hidden" name="fc_booking_end" value="{{ $det_booking->fc_booking_end }}">
                            <input type="hidden" name="fd_date_book" value="{{ $det_booking->fd_date_book }}">
                            <input type="hidden" name="fc_kdjam" value="{{ $det_booking->fc_kdjam }}">
                            <input type="hidden" name="created_at" value="{{ $det_booking->created_at }}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" >
                            </div>
                            @foreach ($form as $r)
                            <input type="hidden" name="fc_type[]" value="{{ $r->fc_type }}" class="form-control" >
                            <input type="hidden" name="fv_label[]" value="{{ $r->fv_label }}" class="form-control" >
                            <input type="hidden" name="fv_shorthand_code[]" value="{{ $r->fv_shorthand_code }}" class="form-control" >
                            <div class="form-group">
                                <label>{{ $r->fv_label }}</label>

                                @if ($r->fc_type=="SIMPLE")
                                    <input type="text" name="fv_value[]" class="form-control" >
                                @elseif($r->fc_type=="PARAGRAPH")
                                    <textarea name="fv_value[]" class="form-control" ></textarea>
                                @elseif($r->fc_type=="EMAILS")
                                    <input type="email" name="fv_value[]" class="form-control" >
                                @elseif($r->fc_type=="PHONE")
                                    <input type="number" name="fv_value[]" class="form-control" >
                                @endif
                            </div>
                            @endforeach

                            <div class="form-group">
                                <label></label>
                                <button id="btnSave" type="submit" class="btn btn-success">Confirm Booking</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
