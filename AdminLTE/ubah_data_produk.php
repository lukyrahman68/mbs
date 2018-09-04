<?php
include "header.php";
$id_produk=$_GET['id'];
$getKategori=mysqli_query($db,"select * from kategori");
$getSub_Kategori=mysqli_query($db,"select * from sub_kategori");
$getProduk=mysqli_query($db,"SELECT b.nama,k.nama,s.nama,b.ket,m.gambar,u.nama,b.id from barang b, kategori k, sub_kategori s
,user u, media m where s.idkat=k.id and b.id_sub=s.id and b.id_admin=u.id and b.id_media=m.id and b.id='$id_produk'");
$dataProduk=mysqli_fetch_array($getProduk);
?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
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
          <!-- Input form -->
          <form action="proses_simpan_produk.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                <label for="jml">Upload Gambar</label>
                                </div>
                                <div class="col-md-9">
                                <input type="file" class="form-control" style="padding-bottom: 40px;" name="gambar" id="fileToUpload" onchange="readURL(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="../uploads/produk/<?php echo $dataProduk[4] ?>" id="blah" height='300px' width='600px' alt="Preview" class="img-thumbnail rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                            <?php
                                while($dataKategori=mysqli_fetch_array($getKategori)){
                                    ?>
                                    <option value="<?php echo $dataKategori['id'] ?>"<?php if($dataProduk[1]==$dataKategori['nama']) echo 'selected' ?>> <?php echo $dataKategori['nama']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sub-Kategori</label>
                            <select name="sub_kategori" id="sub_kategori" class="form-control">
                                <option value="-">-</option>
                            <?php
                                while($dataSub_Kategori=mysqli_fetch_array($getSub_Kategori)){
                                    ?>
                                    <option value="<?php echo $dataSub_Kategori['id']?>" <?php if($dataProduk[2]==$dataSub_Kategori['nama']) echo 'selected'?>><?php echo $dataSub_Kategori['nama']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                              <label for="exampleInputPassword1">Judul/Merek</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul/Merk" value="<?php echo $dataProduk[0] ?>">
                        </div>
                        <div class="box-body pad">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea id="editor1" name="ket" rows="10" cols="80"><?php echo $dataProduk[3] ?></textarea>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" name="update" value="<?php echo $dataProduk[6] ?>" >Simpan</button>
                    </div>
                </div>
            </div>
            </form>
            <!-- End Input Form -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
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