<?php
require_once "../config/database.php";
include "header.php";
$site=$_GET['id'];
$getID=mysqli_query($db,"select site from site where id='$site'");
while($data = mysqli_fetch_array($getID)){
	$id=$data['site'];
}        
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Site <?php echo $id;?>
      <!--   <small></small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            <a href="entry.php?id=<?php echo $site;?>" data-toggle="modal" class="btn btn-sm btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus fa-1x"></i> Tambah</a>
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
                  <?php }elseif($status== 5){?>
                      <div class="alert alert-danger"><?php echo @$_GET['msg'] ?></div>
                  <?php }
            ?>
                                          
            <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                  <th>id</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Date Create</th>
                  <th>Status</th>
                  <th>Aksi</th>
              </tr>
                </thead>
                <tbody>
                <?php
                  $get = mysqli_query($db, "SELECT idpost,judul,isi,datecreate,status from post where id_site='$site'");
                  while ($data = mysqli_fetch_array($get)) {
                    $panjang=100;
                    $text=$data['isi'];
                    $cetak = substr($text, 0, $panjang);
                  ?>
                <tr>
                      <td><?php echo $data['idpost']; ?></td>
                      <td><?php echo $data['judul'];?></td>
                      <td><?php echo $cetak; ?>.....</td>
                      <td><?php echo $data['datecreate'];?></td>
                      <td><?php echo $data['status']; ?></td>
                      <td style="text-align:center">
                      <a href="ubah_data_post.php?id=<?php echo $data['idpost']?>&&site=<?php echo $site;?>"class="btn btn-info btn-sm">Ubah </a>
                      <br>
                      <br>
                      <a href="#yakin"class="btn btn-danger btn-sm" data-id="<?php echo $data['idpost'] ?>" data-site="<?php echo $site ?>" data-toggle="modal">Hapus</a>
                      <!-- <a href="proses_simpan_data.php?aksi=hapus&&id=<?php echo $data['idpost']?>&&site=<?php echo $site;?>"class="btn btn-danger btn-sm">Hapus </a> -->
                      </td>
                </tr>
                <?php
                    }
                  ?>
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
  </div>
  <!-- Modal -->
 <div class="modal fade" tabindex="-1" id="yakin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="mySmallModalLabel">Peringatan</h4>
        </div>
        <div class="modal-body text-center">
        <h3>Anda yakin akan menghapus data ini ?</h3>
          <form action="proses_simpan_data.php" method="post">
              <input type="hidden" id="id" name="id" readonly />
              <input type="hidden" id="site" name="site" readonly />
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="hapus" class="btn btn-primary">Hapus</button>
          </div>
          </form>
      </div>
    </div>
  </div>

<?php
include "footer.php";
?>