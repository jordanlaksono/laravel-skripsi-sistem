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
        <div class="col-lg-12" >
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-tag"></i>
                      Confirm Booking
                    </h3>
                </div>
                <div class="card-body" style="text-align: -webkit-center;">
                    <div class="col-md-3 col-sm-6 col-12">
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
                    <p>{{ $after_booking->fv_isi }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
