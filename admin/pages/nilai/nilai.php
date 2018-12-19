<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nilai</title>
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
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Nilai</h4>
                  </div>
                  <div class="modal-body">
                          <div class="form-group">
                            <label>NO</label>
                            <input type="number" class="form-control" name="add_no" placeholder="no">
                          </div>
                          <div class="form-group">
                            <label>NAMA MAHASISWA</label>
                            <input type="text" class="form-control" name="add_nama_mhs" placeholder="nama_mhs">
                          </div>
                          <div class="form-group">
                            <label>NAMA DOSEN</label>
                            <input type="text" class="form-control" name="add_nama_dosen" placeholder="nama_dosen">
                          </div>
                          <div class="form-group">
                            <label>NAMA MATA KULIAH</label>
                            <input type="text" class="form-control" name="add_nama_mk" placeholder="nama_mk">
                          </div>
                          <div class="form-group">
                            <label>KELAS</label>
                            <input type="text" class="form-control" name="add_kelas" placeholder="kelas">
                          </div>
                          <div class="form-group">
                            <label>PERTANYAAN</label>
                            <input type="text" class="form-control" name="add_kuis" placeholder="kuis">
                          </div>
                          <div class="form-group">
                            <label>NILAI</label>
                            <input type="text" class="form-control" name="add_nilai" placeholder="nilai">
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
            <table id="tabel_data_pegawai" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA MAHASISWA</th>
                  <th>NAMA DOSEN</th>
                  <th>NAMA MK</th>
                  <th>KELAS</th>
                  <th>PERTANYAAN</th>
                  <th>NILAI</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tr>
                  <td>123</td>
                  <td>hde</td>
                  <td>1er</td>
                  <td>123</td>
                  <td>123</td>
                  <td>123</td>
                  <td>ass</td>
                  <td>
                    <a href="#delete" class="delete" data-toggle="modal">
                    <i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
                    
                </tr>
            </table>                   
                  </div><!-- /.box-body -->
          <!-- /view data -->
        </div>
        <!-- /box box-primary-->
      </div><!--/.col (right) -->
    </div> <!-- /.row -->
  </section><!-- /.content -->
</div>

<!-- Edit Modal HTML -->
    <div id="edit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
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
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
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
</body>
</html>
