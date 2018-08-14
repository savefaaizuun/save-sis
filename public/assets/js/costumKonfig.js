function get_table(){
      $('#konfig-tahun-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.tahun_ajaran')}}",

            columns: [

                {data:'id', name: 'id'},
                {data:'tahun_akademik', name: 'tahun_akademik'},
                {data:'semester', name: 'semester'},
                {data:'is_aktif', name: 'is_aktif', orderable:false, searchable:false},
                {data:'action', name: 'action', orderable:false, searchable:false}
                ]
        });
    }

    get_table();

    function addForm(){
            save_method = "add";
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Konfigurasi Tahun Akademik');
        }

    function editForm(id){
      save_method = 'edit';
      $('input[name=_method]').val('PATCH');
      $('#modal-form form')[0].reset();
      $.ajax({
        url: "{{ url('tahun_ajaran')}}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data){
          console.log(data);
          $('#modal-form').modal('show');
          $('.modal-title').text('Edit Tahun Ajaran');

          $('#id').val(data.id);
          $('#tahun_akademik').val(data.tahun_akademik);
          $('#semester').val(data.semester);
          $('is_aktif').val(data.is_aktif);
        },
        error: function(){
          alert('Data tidak di temukan');
        }
      });
    }

    $(function(){
      $('#modal-form form').validator().on('submit', function (e) {
        console.log('masuk');
        if (!e.isDefaultPrevented()) {
          var id = $('#id').val();
          if (save_method == 'add') 
            url = "{{ url('tahun_ajaran') }}";
          else 
            url = "{{ url('tahun_ajaran') . '/'}}" + id;

          $.ajax({
            url : url,
            type : "POST",
            data : $('#modal-form form').serialize(),
            success : function(data){
              console.log('sukses');
              $('#modal-form').modal('hide');
              get_table();
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
          return false;
        } 
      });
    });
