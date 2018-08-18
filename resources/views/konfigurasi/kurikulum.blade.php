@extends('layouts.master')



@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="box-btn-add" style="margin-top: 30px;">
            <button onclick="addForm()" class="btn btn-outline btn-info  dim" type="button"><i class="fa fa-plus"></i> Tambah</button>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <table id="konfig-kurikulum-table" class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kurikulum</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" class="form-horizontal" data-toggle="validator">
            {{ csrf_field() }} {{ method_field('POST')}}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Kurikulum</label>
                    <div class="col-md-6">
                        <input type="text" id="nama_kurikulum" name="nama_kurikulum" class="form-control" autofocus required>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Status Aktif</label>
                    <div class="col-md-1">
                        <input type="checkbox" id="is_aktif" name="is_aktif" class="form-control">
                        <span class="help-block with-errors"></span>
                    </div>
                </div>          
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-save">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
        </form>
      
      
      
    </div>
  </div>
</div>

<script>

    var table = $('#konfig-kurikulum-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.konfig_kurikulum')}}",

        columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index'},
            {data: 'nama_kurikulum', name: 'nama_kurikulum'},
            {data: 'is_aktif', name: 'is_aktif', orderable:false, searchable:false},
            {data:'action', name: 'action', orderable:false, searchable:false}
        ]
    })
    function addForm(){
        save_method = "add";
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Konfigurasi Kurikulum');
    }

    function editForm(id){
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('konfig_kurikulum')}}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
        })
        .done(function(data) {
            console.log("success");
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Konfig Kurikulum');

            $('#id').val(data.id);
            $('#nama_kurikulum').val(data.nama_kurikulum);
            
            //cek val is_aktif
            if (data.is_aktif == 1){
               $('#is_aktif').attr('checked',true);
            } else {
                $('#is_aktif').attr('checked',false);
            }
        })
        .fail(function() {
            console.log("error");
            alert('Data tidak di temukan');
        })
        .always(function() {
            console.log("complete");
        });
        
    }

    function deleteData(id){
      // var popup = confirm("are you sure for delete this data?");
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      console.log(csrf_token);

      swal({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak dapat mengembalikan ini!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Iya, hapus ini!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                url : "{{ url('konfig_kurikulum')}}"+ '/' + id,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
            })
            .done(function(data) {
                console.log("success");
                table.ajax.reload();
                swal({
              title: 'Success!',
              text : 'Data berhasil di hapus',
              type : 'success',
              timer : '1500' 
            })
            })
            .fail(function() {
                console.log("error");
                swal({
              title : 'Oops ...',
              text : 'terjasi kesalahan!',
              type : 'error',
              timer : '1500'
            })
            })
            .always(function() {
                console.log("complete");
            });
            
          $.ajax({
          url : "{{ url('konfig_kurikulum')}}"+ '/' + id,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            table.ajax.reload();
            // console.log(data);
            // console.log('kehapus');
            swal({
              title: 'Success!',
              text : 'Data berhasil di hapus',
              type : 'success',
              timer : '1500' 
            })
          },
          error : function (){
            swal({
              title : 'Oops ...',
              text : 'terjasi kesalahan!',
              type : 'error',
              timer : '1500'
            })
          }
        });
        } else {
          swal({
              title: 'Data batal hapus!',
              text : 'Batal Hapus',
              type : 'success',
              timer : '1500' 
            })
        }
        
      });
    }

    $(function(){
    $('#modal-form form').validator().on('submit', function(e){
       if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') 
            url = "{{ url('konfig_kurikulum')}}";
        else 
            url = "{{ url('konfig_kurikulum') . '/'}}" + id;
        console.log(url);
        $.ajax({
            url : url,
            type : "POST",
            data : $('#modal-form form').serialize(),
        })
        .done(function(data) {
            console.log("success");
            $('#modal-form').modal('hide');
                table.ajax.reload();
                if (save_method == 'add') 
                    swal({
                        title: 'Success!',
                        text : 'Data berhasil di tambahkan',
                        type : 'success',
                        timer : '1500' 
                    })
                else
                    swal({
                      title: 'Success!',
                      text : 'Data berhasil di update',
                      type : 'success',
                      timer : '1500' 
                    })
        })
        .fail(function() {
            console.log("error");
            swal({
                title : 'Oops ...',
                text : 'terjasi kesalahan!',
                type : 'error',
                timer : '1500'
              })
        })
        .always(function() {
            console.log("complete");
        });
        return false;
       } 
    });
});

</script>

@endsection