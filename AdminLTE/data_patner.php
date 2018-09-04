<?php
require_once "../config/database.php";
include "header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kategori</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            <a href="#tambah_kategori" data-toggle="modal" class="btn btn-sm btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus fa-1x"></i> Tambah</a>

            <!-- modal open -->
            <!-- Modal -->
            <div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Patnership</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="proses_tambah_kategori.php" method="post" enctype="multipart/form-data">
                    <div class="form-group" style="padding:20px;">
                        <label for="exampleInputPassword1">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- modal end -->
            <!-- alert -->
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
                $status = $_GET['status'];
                if ($status == 1) {
                    ?>
                        <div class="alert alert-danger">Data Gagal Disimpan</div>
                    <?php } else if ($status == 2) {?>
                        <div class="alert alert-success">Data Berhasil Disimpan</div>
                    <?php }else if ($status == 3) {?>
                        <div class="alert alert-success">Data Berhasil Dihapus</div>
                    <?php }else if ($status == 4) {?>
                        <div class="alert alert-danger">Data Gagal Dihapus</div>
                    <?php }
                ?>
                                          
              <table id="dataTable" class="table table-bordered table-hover" style="text-align: center;">
              
                <thead>
                <tr>
                  <th>id</th>
                  <th>Nama Kategori</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($db, "SELECT * from kategori");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                      <tr >
                      <td class="id_ruangan" style="display: none"><?php echo $data[4]; ?></td>
                      <td style="display: none"><?php echo $data[5]; ?></td>
                      <td><?php echo $data[0]; ?></td>
                      <td><?php echo $data[1];?></td>
                      <td>
                      <a href="#ubah_kategori" data-toggle="modal" data-id="<?php echo $data[0]; ?>" data-kategori="<?php echo $data[1]; ?>" class="btn btn-info btn-sm">Ubah </a>
                      <a href="proses_hapus_kategori.php?tabel=kategori&&id=<?php echo $data[0] ?>" class="btn btn-danger btn-sm">Hapus </a>
                      </td>
                      </tr>
                  <?php
                    }
                  ?>
                 <!-- Modal -->
                <div class="modal fade" tabindex="-1" id="ubah_kategori">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="mySmallModalLabel">Ubah</h4>
                    </div>
                    <div class="modal-body">
                        <form action="proses_ubah_kategori.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori">
                        </div>
                            <input type="hidden" id="id" name="id" readonly />
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Ubah</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>   
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
<?php
include "footer.php";
?>
