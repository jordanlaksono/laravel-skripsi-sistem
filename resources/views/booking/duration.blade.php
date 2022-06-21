@extends('layouts.templateprofile')
@section('title','Duration & Display')

@section('contentprofile')
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-tag"></i>
                        Duration & Display
                        </h3>
                    </div>
                    <div class="card-body">
                        @if(session('pesan'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{ session('pesan') }}
                                </div>
                        @endif
                        <form action="/bookings/update_duration" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="kode_booking" value="{{ $kode_booking }}"> --}}
                        <input type="hidden" name="ID" value="{{ $status->fc_kdusers}}">
                        <div class="form-group">
                            <label>Show availability in increments of</label>
                            <select class="form-control" name="fc_isi">
                                @foreach ($kode_jam as $i)
                                    @if ($i->fc_kdjam ==  $status->fc_isi )
                                        <option value="{{ $i->fc_kdjam }}" selected>{{ $i->fc_duration }}</option>
                                    @else
                                        <option value="{{ $i->fc_kdjam }}">{{ $i->fc_duration }}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
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
@endsection
