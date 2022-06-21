@extends('layouts.templateprofile')
@section('title','After Boking')

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
                    <form action="/bookings/after_booking_update/" method="POST" >
                        @csrf
                        <input type="hidden" name="fc_kdbooking" value="{{ $after_booking->fc_kdbooking }}">
                        <div class="form-group">
                            <label>After booking is made</label>
                            <textarea class="form-control @error('fv_isi') is-invalid @enderror" rows="3" placeholder="Enter ..."  name="fv_isi">{{ $after_booking->fv_isi }}</textarea>
                            <div class="text-danger">
                                @error('fv_isi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">All changes saved</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
