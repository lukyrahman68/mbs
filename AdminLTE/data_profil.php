<?php
require_once "../config/database.php";
include "header.php";
$getProfil=mysqli_query($db,"select * from profile");
$dataProfil=mysqli_fetch_array($getProfil);
$id_gambar=$dataProfil['id_media'];
$getGambar=mysqli_query($db,"select gambar from media where id='$id_gambar'");
$dataGambar=mysqli_fetch_array($getGambar);
$gambar=$dataGambar[0];

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
              <h3 class="box-title">Data Profile</h3>
            </div>
            <!-- /.box-header -->
            <?php 
                if($dataProfil['id']==""){
            ?>
            <div class="box-body">
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
                <form action="proses_simpan_profile.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_p" name="nama_p" placeholder="Nama Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi Perusahaan</label>
                            <input type="text" class="form-control" id="des" name="des" placeholder="Deskripsi Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat Perusahaan</label>
                            <input type="text" onFocus="geolocate()" class="form-control" id="alamat" name="alamat" placeholder="Alamat Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telpn Perusahaan</label>
                            <input type="text" class="form-control" id="tlpn" name="tlpn" placeholder="Telpn Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Perusahaan</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pendiri</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pendiri" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Motto Pendiri</label>
                            <input type="text" class="form-control" id="motto" name="motto" placeholder="Motto Pendiri" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                <label for="jml">Foto Pemilik</label>
                                </div>
                                <div class="col-md-9">
                                <input type="file" class="form-control" style="padding-bottom: 40px;" name="gambar" id="fileToUpload" onchange="readURL(this);" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group" style="display:grid;justify-items: center;align-item:center;">
                                <img src="../uploads/no.png"  id="blah" height='300' width='600' alt="Preview" class="img-thumbnail rounded">
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.box-body -->
            <?php
                }else{
                    ?>
                    <div class="box-body">
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
                <form action="proses_simpan_profile.php?id=<?php echo $dataProfil['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_p" name="nama_p" placeholder="Nama Perusahaan" value="<?php echo $dataProfil['nama_perusahaan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi Perusahaan</label>
                            <textarea id="editor1" name="des" rows="10" cols="80" required><?php echo $dataProfil['deskripsii'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat Perusahaan</label>
                            <input type="text" onFocus="geolocate()" class="form-control" id="alamat" name="alamat" placeholder="Alamat Perusahaan" value="<?php echo $dataProfil['alamat'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telpn Perusahaan</label>
                            <input type="text" class="form-control" id="tlpn" name="tlpn" placeholder="Telpn Perusahaan" value="<?php echo $dataProfil['tlpn'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Perusahaan</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Perusahaan" value="<?php echo $dataProfil['email'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pendiri</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pendiri" value="<?php echo $dataProfil['nama_pemilik'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Motto Pendiri</label>
                            <input type="text" class="form-control" id="motto" name="motto" placeholder="Motto Pendiri" value="<?php echo $dataProfil['motto'] ?>" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                <label for="jml">Foto Pemilik</label>
                                </div>
                                <div class="col-md-9">
                                <input type="file" class="form-control" style="padding-bottom: 40px;" name="gambar" id="fileToUpload" onchange="readURL(this);">
                                </div>
                            </div>
                            <br>
                            <div class="form-group" style="display:grid;justify-items: center;align-item:center;">
                                <img src="../uploads/profile_perusahaan/<?php echo $gambar ?>"  id="blah" height='300' width='600' alt="Preview" class="img-thumbnail rounded">
                            </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.box-body -->

                    <?php
                }
            ?>
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
