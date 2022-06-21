@extends('layouts.templatelogin')
@section('title','Register Dosen')

@section('contentlogin')
<div class="content">
    <div class="container">
      <div class="row">
        <div class="card card-primary" style="margin-left: 365px;width: 433px;">
            @if(session('pesan'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('pesan') }}
                </div>
            @endif
            <div class="card-header">
              <h3 class="card-title">Register Dosen</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="/register/insert_dosen" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}">
                  <div class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Password">
                  <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                   </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control  @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" placeholder="Password">
                    <div class="text-danger">
                          @error('jurusan')
                              {{ $message }}
                          @enderror
                     </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password">
                    <div class="text-danger">
                          @error('password')
                              {{ $message }}
                          @enderror
                     </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection
