@extends('layouts.templateprofile')
@section('title','Skripsi')

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
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jurusan</th>
                <th>Judul Skripsi</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no= 1;?>
                @foreach ($mahasiswa as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>{{ $data->judul_skripsi }}</td>
                    <td>
                        <a href="/skripsi/skripsi_detail/{{ $data->fc_kdusers }}" class="btn btn-sm btn-success">Skripsi</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
       </table>
      </div>
      </div>
      </div>
    </div>
</div>
@endsection
