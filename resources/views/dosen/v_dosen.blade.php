@extends('layouts.template')
@section('title','Dosen')

@section('content')
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
                <th>Nama Dosen</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no= 1;?>
                @foreach ($dosen as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>
                        <a href="/dosen/calender/{{ $data->fc_kdusers }}" class="btn btn-sm btn-success">Calender</a>
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
