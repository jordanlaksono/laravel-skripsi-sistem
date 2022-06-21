@extends('layouts.templateprofile')
@section('title','Edit Booking Page')

@section('contentprofile')
<style>
    .ui-sortable {
        display: block;
        position: relative;
        overflow: visible;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .ui-sortable.sortable_vertical .ui-sortable-item {
        float: none;
    }

    .ui-sortable.sortableHandled .ui-sortable-item {
        -ms-touch-action: initial;
        touch-action: initial;
        cursor: default !important;
    }

    .ui-sortable .ui-sortable-item {
        float: left;
        cursor: move;
    }

    .ui-sortable .ui-sortable-item {
        -ms-touch-action: none;
        touch-action: none;
    }

    .profileListItem {
        border: 1px solid #D4DBE0;
        display: table;
        width: 100%;
        table-layout: fixed;
        margin-bottom: 10px;
        background: #fff;
        border-radius: 3px;
    }

    .ui-sortable.sortableHandled .ui-sortable-item .sortHandle {
        -ms-touch-action: none;
        touch-action: none;
    }

    .profileListItem .sortHandle {
        width: 40px;
        text-align: center;
        border-right: 1px solid #D4DBE0;
        color: #889196;
        cursor: move;
        -ms-touch-action: none;
        touch-action: none;
    }

    .profileListItem>* {
        display: table-cell;
        vertical-align: middle;
        padding: 10px;
    }

    ._q2vo16 {
        vertical-align: middle !important;
        display: inline-block !important;
    }

    .profileQuestion.profileListItem .profileQuestionInfo, .profileQuestion.profileListItem .profileQuestionControls {
        cursor: pointer;
    }

    .profileListItem>* {
        display: table-cell;
        vertical-align: middle;
        padding: 10px;
    }

    .profileQuestionCode {
        color: #889196;
        font-style: italic;
        margin-right: 5px;
        display: inline-block;
        -webkit-transform-origin: left center;
        -ms-transform-origin: left center;
        transform-origin: left center;
        -webkit-transform: scale(0.9);
        -ms-transform: scale(0.9);
        transform: scale(0.9);
    }

    .profileQuestion.profileListItem .profileQuestionControls {
        margin: 10px;
        line-height: 45px;
        height: 40px;
        width: 80px;
    }

    .profileQuestion.profileListItem .profileQuestionInfo, .profileQuestion.profileListItem .profileQuestionControls {
        cursor: pointer;
    }

    .profileListItem>* {
        display: table-cell;
        vertical-align: middle;
        padding: 10px;
    }

    ._q2vo16 {
        vertical-align: middle !important;
        display: inline-block !important;
    }

    .profileQuestion.profileListItem .profileQuestionControls a {
        float: right;
        margin-right: 0;
        color: #656D72;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        vertical-align: middle;
        line-height: 22px;
        text-align: center;
        border: 1px solid transparent;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6" >
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-tag"></i>
                      Booking questions
                    </h3>
                </div>
                <div class="card-body">
                    <div class="ui-sortable sortableList sortable_vertical profileQuestions sortableHandled">
                        <div id="idImgLoader" class="overlay" style="text-align: center"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>
                        <div style="display:none;" id="view_question"></div>
                        <div class="controls"><a href="#" tabindex="0" data-toggle="modal" data-target="#modal-default"><span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;"><svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 3a1 1 0 00-1 1v3H4a1 1 0 100 2h3v3a1 1 0 002 0V9h3a1 1 0 000-2H9V4c0-.6-.4-1-1-1z"></path></svg></span> Add question</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Question</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-add" action="/bookings/insert_question" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fc_kdbooking" value="{{ Request::segment(3) }}">
        <div class="modal-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="fc_type">
                                <option value="SIMPLE">Short answer</option>
                                <option value="PARAGRAPH">Long answer</option>
                                <option value="EMAILS">Email address</option>
                                <option value="PHONE">Phone number</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Label</label>
                            <input type="text" name="fv_label" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label>Shorthand code</label>
                            <input type="text" name="fv_shorthand_code" class="form-control" >

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fc_required" value="1">
                                <label class="form-check-label">This is a required field</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="btnSave" type="submit" class="btn btn-primary">All Changes Saved</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Question</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-update" action="/bookings/question_update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fn_id" class="form-control" >
        <div class="modal-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="fc_type_update" id="">
                                <option value="SIMPLE">Short answer</option>
                                <option value="PARAGRAPH">Long answer</option>
                                <option value="EMAILS">Email address</option>
                                <option value="PHONE">Phone number</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Label</label>
                            <input type="text" name="fv_label_update" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label>Shorthand code</label>
                            <input type="text" name="fv_shorthand_code_update" class="form-control" >

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fc_required" id="fc_requiredid" value="1">
                                <label class="form-check-label">This is a required field</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="btnUpdate" type="submit" class="btn btn-primary">All Changes Saved</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="delete">
    <div class="modal-dialog modal-md">
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title" style="display: flex;"> Delete question ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-delete" action="/bookings/delete_question" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fn_id" id="fn_id_det">
        <div class="modal-body">
          <p>Are you sure you want to delete the question A question? <span id="fv_label_det"></span></p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-outline-light btn-danger">Delete Question</button>
        </div>
       </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>
<script>
    var kd_booking = "{{ $kode_booking }}";
    $(document).ready(function () {
        $('#idImgLoader').fadeOut(3000);
        setTimeout(function(){
                data();
        }, 3000);

        tampil_question();

        $('#form-add').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true); },
                success: function(response) {
                    if(response.status) { Batal();  $('#idImgLoader').fadeOut(3000);  setTimeout(function(){data();}, 3000); tampil_question();
                    } else { Batal();  $('#idImgLoader').fadeOut(3000);  setTimeout(function(){data();}, 3000); tampil_question(); }
                },
                complete: function() { $('#btnSave').text('save'); $('#btnSave').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-update').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnUpdate').text('saving...'); $('#btnUpdate').attr('disabled',true); },
                success: function(response) {
                    if(response.status) { Batal2();  $('#idImgLoader').fadeOut(3000);  setTimeout(function(){data();}, 3000); tampil_question();
                    } else { Batal2();  $('#idImgLoader').fadeOut(3000);  setTimeout(function(){data();}, 3000); tampil_question(); }
                },
                complete: function() { $('#btnUpdate').text('save'); $('#btnUpdate').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });

        $('#form-delete').submit(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault(); var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
                beforeSend: function() { $('#btnDelete').text('saving...'); $('#btnDelete').attr('disabled',true); },
                success: function(response) {
                    if(response.status) { Batal3();  $('#idImgLoader').fadeOut(3000);  setTimeout(function(){data();}, 3000); tampil_question();
                    } else { Batal3();  $('#idImgLoader').fadeOut(3000);  setTimeout(function(){data();}, 3000); tampil_question(); }
                },
                complete: function() { $('#btnDelete').text('save'); $('#btnDelete').attr('disabled',false); },
                cache: false, contentType: false, processData: false
            });
            return false;
        });
    })

    function data(){
            $('#view_question').fadeIn();
    }

    function tampil_question(){
        var question = '';
        $.getJSON('/bookings/load_question/'+kd_booking, {
            format: "json"
        })
        .done(function (data) {
            $.each(data, function (key, val) {
                question += `
                        <div class="ui-sortable-item">
                            <div class="profileQuestion profileListItem" data-error="false" data-warning="false">
                                <div class="sortHandle"><span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;"><svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8.02 0a1 1 0 01.35.07l.05.02a1.02 1.02 0 01.18.1l.03.03.01.01.01.01.06.05 3 3a1 1 0 01-1.32 1.5l-.1-.08L9 3.4v9.18l1.3-1.3a1 1 0 011.31-.08l.1.08a1 1 0 010 1.42l-3 3A1 1 0 018 16h-.03a1 1 0 01-.06 0H8a1 1 0 01-.7-.3l.08.09a1 1 0 01-.09-.08l-3-3a1 1 0 011.42-1.42L7 12.6V3.4l-1.3 1.3a1 1 0 01-1.31.08l-.1-.08a1 1 0 01-.08-1.32l.08-.1 3-3 .08-.07a.95.95 0 01.1-.07l.05-.03.06-.03.05-.02a.99.99 0 01.22-.06h.07L8 0h.02zm.6.22l.09.07-.07-.06h-.01zM7.93 0zM8 0h-.07H8z"></path></svg></span></div>
                                <div class="profileQuestionInfo"><span class="profileQuestionCode">{${val.fv_shorthand_code}} </span><span class="profileQuestionBefore">${val.fv_label}</span></div>
                                <div class="profileQuestionControls">
                                    <a href="javascript:void(0)" onclick="edit('${val.fn_id}')" tabindex="0">
                                    <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                                        <svg viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M10.3.3a1 1 0 011.4 0l4 4c.4.4.4 1 0 1.4l-10 10a1 1 0 01-.7.3H1a1 1 0 01-1-1v-4c0-.3.1-.5.3-.7zM8 5.4l-6 6V14h2.6l6-6L8 5.4zm3-3L9.4 4 12 6.6 13.6 5 11 2.4z"></path></svg>
                                    </span>
                                    </a>
                                    <a href="javascript:void(0)" onclick="hapus('${val.fn_id}')" tabindex="0">
                                    <span class="_q2vo16" style="width: 16px; height: 16px; line-height: 16px;">
                                        <svg viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd" d="M8 0a2 2 0 011.7 1H13a3 3 0 013 3 2 2 0 01-1 1.7V14a2 2 0 01-2 2H3a2 2 0 01-2-2V5.7A2 2 0 010 4a3 3 0 013-3h3.3c.3-.6 1-1 1.7-1zm5 6H3v8h10V6zM8 7c.5 0 1 .4 1 .9V12a1 1 0 01-2 .1V8c0-.6.4-1 1-1zM5 7c.5 0 1 .4 1 .9V12a1 1 0 01-2 .1V8c0-.6.4-1 1-1zm6 0c.6 0 1 .4 1 1v4a1 1 0 01-2 0V8c0-.6.4-1 1-1zm2-4H3a1 1 0 00-1 1h12c0-.6-.4-1-1-1z"></path>
                                        </svg>
                                    </span>
                                    </a>
                                    </div>
                            </div>
                        </div>
                `;
            })

            var f = document.getElementById("view_question");
            f.innerHTML= question;
            document.getElementById('view_question').style.display = "block";
        })
    }

    function Batal() {
        $('#view_question').fadeIn();
        $('#modal-default').modal('hide');
    }

    function Batal2() {
        $('#view_question').fadeIn();
        $('#modal-update').modal('hide');
    }

    function Batal3() {
        $('#view_question').fadeIn();
        $('#delete').modal('hide');
    }

    function edit(id) {
			save_method = 'update';
			$('#modal-update').modal('show');
			$.ajax({
				url : "/bookings/update_question/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(result) {

					$('[name="fc_type_update"]').val(result.fc_type);
					$('[name="fn_id"]').val(result.fn_id);
					$('[name="fv_label_update"]').val(result.fv_label);
					$('[name="fv_shorthand_code_update"]').val(result.fv_shorthand_code);

                    if(result.fc_required=='1'){
                        $("fc_requiredid").prop("checked",true);
                    }else{
                        $("fc_requiredid").prop("checked",false);
                    }

				}, error: function (jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
	}

    function hapus(id){
        $('#delete').modal('show');
        $.ajax({
            url : "/bookings/getID/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                $('#fn_id_det').val(result.fn_id);
                $('#fv_label_det').html('<b>'+result.fv_label+'</b>');

            }, error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
            }
        });
    }
</script>
@endsection
