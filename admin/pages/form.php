<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Event</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link href="../plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/sweetalert.css">
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script> <!-- lib js untuk ajax -->
  <script src="../bootstrap/js/bootstrap.min.js"></script> <!-- lib js untuk modals -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script> <!-- lib js untuk datatables -->
  <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script> <!-- lib js untuk datatables -->
  <script src="../dist/js/sweetalert.min.js"></script> <!-- lib js untuk sweet alert -->

  <?php 
    require_once '../assets/dist/css/admin/daftar_dosen.css';
     ?>

</head>
<body>

<div >
  <?php
  $aksi = "pages/form_aksi.php";
  switch (@$_GET[aksi]) {
    default:
  ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- box box-primary -->
        <div class="box box-primary">
          <!-- modal dialog-->
          <div class="modal fade" id="mymodaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Event</h4>
                  </div>
                  <div class="modal-body">
                          <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="add_id" placeholder="id">
                          </div>
                          <div class="form-group">
                            <label>JUDUL EVENT</label>
                            <input type="text" class="form-control" name="add_nama" placeholder="nama">
                          </div>
                           <div class="form-group">
                            <label for="exampleInputFile">FOTO</label>
                            <input type="file" id="exampleInputFile" />
                            <p class="help-block">Masukan File Foto/ Gambar event .</p>
                             </div>
                          
                          <div class="form-group">
                          <label for="exampleInputEmail1">DESKRIPSI EVENT</label>
                          <textarea class="form-control" rows="3" placeholder="Deskripsi"></textarea></div>
                          <div class="form-group">
                            <label>KATEGORI</label>
                            <select class="form-control" name="kategori" >
                                <option value="outdoor_event">Outdoor Event</option>
                                <option value="indoor_event">Indor Event</option>
                            </select>
                          </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-dismiss="modal" id="add_action">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  </div>                  
              </div>
            </div>
          </div>         
          <!-- /modal dialog-->         
          <!-- box-header -->
          <div class="box-header with-border">
            <button class="btn btn-primary tambah-form" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</button>
          </div>
          <!-- /box-header -->          
          <!-- view data -->
                  <div class="box-body">
            <table id="form" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Judul Event</th>
                  <th>Foto</th>
                  <th>Deskripsi Event</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tr>
                  <?php
                  include "../config.php";
                  $query = mysqli_query($conn, " SELECT * FROM table_event ORDER BY id DESC")or die (mysqli_error($conn));
                  if(mysqli_num_rows($query) == 0 ){
                    echo '<tr><td>Tidak ada data</td></tr>';
                  } else{
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['judul_event'] ?></td>
                        <td><?php echo $data['foto'] ?></td>
                        <td><?php echo $data['deskripsi'] ?></td>
                        <td><?php echo $data['kategori'] ?></td>
                  
                  <td>
                    <a href="#edit" class="edit" data-toggle="modal">
                    <i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                    <a href="#delete" class="delete" data-toggle="modal">
                    <i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
                </tr>
                <?php 
                $no++;
              }
              mysqli_free_result($query);
              mysqli_close($conn);
            } ?>
            </table>                   
                  </div><!-- /.box-body -->
          <!-- /view data -->
        </div>
        <!-- /box box-primary-->
      </div><!--/.col (right) -->
    </div> <!-- /.row -->
  </section><!-- /.content -->
</div>

<?php
break;
case "edit" :
  $data = mysqli_query($conn, "SELECT * FROM table_event WHERE id ='$_GET[id]'");
  $edit = mysqli_fetch_array($data);
?>

<!-- Edit Modal HTML -->
    <div id="edit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit Event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                     <div class="modal-body">
                          <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="add_id" placeholder="id">
                          </div>
                          <div class="form-group">
                            <label>JUDUL EVENT</label>
                            <input type="text" class="form-control" name="add_nama" placeholder="nama">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">FOTO</label>
                            <input type="file" id="exampleInputFile" />
                            <p class="help-block">Masukan File Foto/ Gambar event .</p>
                             </div>
                          
                          <div class="form-group">
                          <label for="exampleInputEmail1">DESKRIPSI EVENT</label>
                          <textarea class="form-control" rows="3" placeholder="Deskripsi"></textarea></div>
                          <div class="form-group">
                            <label>KATEGORI</label>
                            <select class="form-control" name="kategori" >
                                <option value="outdoor_event">Outdoor Event</option>
                                <option value="indoor_event">Indor Event</option>
                            </select>
                          </div>
                  </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-info" value="Ubah">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-danger" value="Hapus">
                    </div>
                    
                </form>
            </div>
        </div>
    </div> 
<?php 
    require_once '../assets/dist/js/admin/data_dosen.js';
     ?>
     <?php
     break ;
   }
   ?>
</body>

</html>