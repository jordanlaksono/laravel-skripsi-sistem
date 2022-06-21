@extends('layouts.template')
@section('title','Skripsi')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12" >
        <div class="card">
        <div class="card-body">
            <table id="skripsi_list" data-toggle="table" data-url="/dosen/load_data_skripsi/{{ $kode_users }}" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-sort-name="awal_periode_renop" data-server-side="true" data-sort-order="desc" data-pagination="false">
                <thead>
                    <tr>
                        <th data-formatter="runningFormatter" data-sortable="true">No</th>
                        <th data-field="name|judul_skripsi|nim|jurusan|fc_kdusers"  data-sortable="true" data-formatter="listNama"></th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>
      </div>
    </div>
</div>

<script>

    var kode_user =  "{{ $kode_users }}";

    function runningFormatter(value, row, index) {
        return index + 1;
    }

    // $(document).ready(function () {
    //     $('#skripsi_list').bootstrapTable('refresh', {
    //         url: '/dosen/load_data_skripsi/'+kode_user,
    //     });
    // })

    function listNama(value, row, index){
        return `
            <b><a href="/dosen/detail_skripsi_mahasiswa/${row.fc_kdusers}">${row.judul_skripsi}</a></b><br />
            <p>NIM. ${row.nim} , <i class="fas fa-user"></i> ${row.name}   <small class="badge badge-primary">${row.jurusan}</small></p>
        `;
    }
</script>
@endsection
