<script type="text/javascript">
  var t = $('#tabel_data_pegawai').DataTable({
        "autoWidth": false,
        "rowCallback": function( row, data, index ) {
          $('td:eq(5)', row).html("<button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#mymodalupdate\" onclick='handleClickUpdate("+data[0]+");'><i class=\"fa fa-edit\"></i>Ubah</button>&nbsp;&nbsp;<button class=\"btn btn-danger\"  data-toggle=\"modal\" onclick='handleClickDelete("+data[0]+");'><i class=\"fa fa-trash\"></i>Hapus</button>");
        },        
        "columnDefs": [
            { "width": "2%", sClass: "dt-head-center dt-body-center", "targets": 0 },
            { "width": "15%", sClass: "dt-head-center dt-body-center", "targets": 1 },
            { "width": "20%", sClass: "dt-head-center dt-body-center", "targets": 2 },
            { "width": "20%", sClass: "dt-head-center dt-body-center", "targets": 3 },
            { "width": "15%", sClass: "dt-head-center dt-body-center", "targets": 4 },
            { "width": "20%", sClass: "dt-head-center dt-body-center", "targets": 5 }
          ]
      }); 

  function getDataOnJSON(data, id) {
    for(var i = 0; i < data.length; i++)
    {
      if(data[i][0] == id){
        return data[i];
      }
    }
  }

  function handleClickUpdate(id){
    $.ajax({
      url:"phpCode/action_t_pegawai.php",
      dataType: "json", 
          success:function(data){
            add_data_to_table_t(t, data);
            get_data = getDataOnJSON(data, id);
            $('input[name="update_id"]').val(get_data[0]);
        $('input[name="update_id_disabled"]').val(get_data[0]);
        $('input[name="update_judul_event"]').val(get_data[1]);
        $('input[name="update_foto"]').val(get_data[2]).change();;
        $('input[name="update_deskripsi"]').val(get_data[3]);
        $('select[name="update_kategori"]').val(get_data[4]); 
      }
    })        
  }

  function handleClickDelete(id){
      swal({
        title: "Apa kamu yakin?",
        text: "Kamu tidak akan bisa mengembalikan data yang sudah terhapus!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, hapus!",
        closeOnConfirm: false
      },
      function(){
        $.ajax({
          dataType: "json", 
          url:"phpCode/action_t_pegawai.php",
          type:"POST",
            contentType: false,
            processData: false,     
          data: function() {
                var data = new FormData();
                data.append("action", "delete");
                data.append("id", id);
                return data;
            }(),
            success:function(data){
              add_data_to_table_t(t, data);
          }
        })        
        swal("Terhapus!", "Data berhasil dihapus.", "success");
      });     
  }

  function add_data_to_table_t(table, data){
        table.clear().draw();
        table.rows.add(data).draw( false );
  }   

  function refresh_tabel(){
    $.ajax({
      url:"phpCode/action_t_pegawai.php",
      dataType: "json", 
          success:function(data){
            add_data_to_table_t(t, data);
            console.log(JSON.stringify(data));
      }
    })      
  }
  
    $(document).ready(function(){
      $(function(){
        t.order( [ 0, 'asc' ] ).draw(false);
        refresh_tabel();
    }); 
    
      $("#add_action").click(function(){
        var judul_event = $("input[name=\"add_judul_event\"]").val();
        var foto = $("select[name=\"add_foto\"]").val();
        var deskripsi = $("input[name=\"add_deskripsi\"]").val();
        var kategori = $("input[name=\"add_kategori\"]").val();
      $.ajax({
        dataType: "json", 
        url:"phpCode/action_t_pegawai.php",
        type:"POST",
            contentType: false,
            processData: false,    
        data: function() {
              var data = new FormData();
              data.append("action", "add");
              data.append("judul_event", judul_event);
              data.append("foto", foto);
              data.append("deskripsi", deskripsi);
              data.append("kategori", kategori);
              return data;
            }(),
            success:function(data){
              add_data_to_table_t(t, data);
        }
      });       
    }); 

      $("#update_action").click(function(){
        var id = $("input[name=\"update_id\"]").val();
        var judul_event = $("input[name=\"update_judul_event\"]").val();
        var foto = $("input[name=\"update_foto\"]").val();
        var deskripsi = $("input[name=\"update_deskripsi\"]").val();
        var kategori = $("selct[name=\"update_kategori\"]").val();
      $.ajax({
        dataType: "json", 
        url:"phpCode/action_t_pegawai.php",
        type:"POST",
            contentType: false,
            processData: false,     
        data: function() {
              var data = new FormData();
              data.append("action", "update");
              data.append("id", id);
              data.append("judul_event", judul_event);
              data.append("foto", foto);
              data.append("deskripsi", deskripsi);
              data.append("kategori", kategori);
              return data;
            }(),
            success:function(data){
              add_data_to_table_t(t, data);
        }
      })          
    });   
  }); 
</script>