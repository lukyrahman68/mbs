<?php
require_once "../config/database.php";
include "header.php";
// $site=$_GET['id'];

// $getID=mysqli_query($db,"select site from site where id='$site'");
// while($data = mysqli_fetch_array($getID)){
// 	$id=$data['site'];      
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User Admin
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
            <a href="newuser.php" class="btn btn-sm btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus fa-1x"></i> Tambah</a>
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
                        <div class="alert alert-danger">Email sudah terdaftar</div>
                    <?php }
                ?>
                                          
              <table id="dataTable" class="table table-bordered table-hover" style="text-align: center;">
              
                <thead>
                <tr>
                  <th width="100px">email</th>
                  <th>Nama</th>
                  <th>alamat</th>
                  <th>Photo</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                  <?php
                  $get = mysqli_query($db, "SELECT a.email, a.nama, a.alamat, m.gambar from admin a join media m on a.id_image=m.id ");
                  while ($data = mysqli_fetch_array($get)) {
                  ?>
                      <tr >
                      <td class="id_ruangan" style="display: none"><?php echo $data[0]; ?></td>
                      <td style="display: none"><?php echo $data[1]; ?></td>
                      <td><?php echo $data[0]; ?></td>
                      <td><?php echo $data[1];?></td>
                      <td><?php echo $data[2]; ?></td>
                      <td><img src="../uploads/user/<?php echo $data[3];?>" alt="" srcset="" style="max-width:200px;max-height:400px;"></td>
                      <td>
                      <a href="simpan_user.php?id=<?php echo $data[0]; ?>"class="btn btn-info btn-sm">Ubah </a>
                      <!-- <a href="proses_hapus_post.php?tabel=site&&id=<?php echo $data[0] ?>" class="btn btn-danger btn-sm">Hapus </a> -->
                      </td>
                      </tr>
                  <?php
                    }
                  ?>
                 <!-- Modal -->                  
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

<?php
include "footer.php";
?>