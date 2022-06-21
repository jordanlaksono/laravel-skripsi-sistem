@extends('layouts.templatelogin')
@section('title','Register Mahasiswa')

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
              <h3 class="card-title">Register Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="/register/insert_mahasiswa" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="NIM" value="{{ old('nim') }}">
                    <div class="text-danger">
                          @error('nim')
                              {{ $message }}
                          @enderror
                    </div>
                </div>
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
                    <label for="exampleInputPassword1">Judul Skripsi</label>
                    <input type="text" name="judul_skripsi" class="form-control  @error('judul_skripsi') is-invalid @enderror" value="{{ old('judul_skripsi') }}" placeholder="Judul Skripsi">
                    <div class="text-danger">
                          @error('judul_skripsi')
                              {{ $message }}
                          @enderror
                     </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Pembimbing</label>
                    <select class="form-control  @error('fc_kdusers_dosen') is-invalid @enderror" name="fc_kdusers_dosen">
                        @foreach ($dosen as $data)
                            <option value="{{ $data->fc_kdusers }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password"> --}}
                    <div class="text-danger">
                          @error('password')
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
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" >
                    <div class="text-danger">
                        @error('photo')
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
