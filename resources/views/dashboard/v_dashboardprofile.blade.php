@extends('layouts.templateprofile')
@section('title','Dashboard')

@section('contentprofile')
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
                    <form action="/dashboard/update/{{ $booking->fc_kdbooking }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label>Booking page title</label>
                                        <input type="text" name="fc_title_booking" class="form-control @error('fc_title_booking') is-invalid @enderror" value="{{ $booking->fc_title_booking }}" >
                                        <div class="text-danger">
                                            @error('fc_title_booking')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label>Booking page link</label>
                                        <input type="text" name="fc_booking_link" class="form-control @error('fc_booking_link') is-invalid @enderror" value="{{ $booking->fc_booking_link }}">
                                        <div class="text-danger">
                                            @error('fc_booking_link')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label>Booking page intro</label>
                                        <textarea class="form-control @error('fv_ket') is-invalid @enderror" rows="3" placeholder="Enter ..."  name="fv_ket"></textarea>
                                        <div class="text-danger">
                                            @error('fv_ket')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        @if ($booking->fv_logo <> '')
                                        <img src="{{ url('images/'.$booking->fv_logo) }}" width="200px;">
                                        @else
                                        <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" width="200px;">
                                        @endif

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ganti Foto</label>
                                            <input type="file" name="fv_logo" class="form-control " >

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
