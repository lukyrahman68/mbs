<?php
include "header.php";
// $getKategori=mysqli_query($db,"select * from kategori");
// $getSub_Kategori=mysqli_query($db,"select * from sub_kategori");
?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Create New User
      <!--   <small>it all starts here</small> -->
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
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
          <!-- Input form -->
          <form action="simpan_user.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" id="mail" name="mail" placeholder="Email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="text" class="form-control" id="pswd" name="pswd" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telephone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Password">
                        </div>
                        <button class="btn btn-sm btn-primary" name="simpan" >Simpan</button>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                <label for="jml">Upload Foto</label>
                                </div>
                                <div class="col-md-9">
                                <input type="file" class="form-control" style="padding-bottom: 40px;" name="gambar" id="fileToUpload" onchange="readURL(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="../uploads/no.png" id="blah" height='300' width='300' alt="Preview" class="img-thumbnail rounded">
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Input Form -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "footer.php";
?>