<!DOCTYPE html>
<html>

<head>
    @include('layouts.head')
</head>

<body>

	@include('layouts.sidebar')
    <!-- content -->
    @yield('content')



@include('layouts.footer')

<script>
    $(document).ready(function(){

        var table = $('#konfig-tahun-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.tahun_ajaran')}}",
            columns: [
                {data:'id', name: 'id'},
                {data:'tahun_akademik', name: 'tahun_akademik'},
                {data:'semester', name: 'semester'},
                {data:'is_aktif', name: 'is_aktif'},
                {data:'action', name: 'action', orderable:false, searchable:false}
                ]
        });

        $('#modal-form form').validator().on('submit', function(e){
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if(save_method == 'add'){
                    url = "{{ url('tahun_ajaran')}}";
                } else {
                    url = "{{ url('tahun_ajaran') . '/'}}" +id;
                }

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#modal-form form').serialize(),
                    success : function(data){
                      console.log('sukses');
                      $('#modal-form').modal('hide');
                      table.ajax.reload();
                      if (save_method == 'add') {
                        swal({
                          title: 'Success!',
                          text : 'Data berhasil di tambahkan',
                          type : 'success',
                          timer : '1500' 
                        })
                      } else {
                        swal({
                          title: 'Success!',
                          text : 'Data berhasil di update',
                          type : 'success',
                          timer : '1500' 
                        })  
                      }
                      
                    },
                    error : function(){
                     // alert('Oops! Something error'); 
                       swal({
                        title : 'Oops ...',
                        text : 'terjasi kesalahan!',
                        type : 'error',
                        timer : '1500'
                      })
                    }
                  });
            }
            
        });

    });

    function addForm(){
            save_method = "add";
            console.log(save_method);
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Konfigurasi Tahun Akademik');
        }


</script>


</body>

</html>
