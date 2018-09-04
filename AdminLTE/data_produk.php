<?php
include "header.php";
$getKategori=mysqli_query($db,"select * from kategori");

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
          <form action="proses_simpan_produk.php" method="POST" enctype="multipart/form-data">
           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                <label for="jml">Upload Gambar 1</label>
                                </div>
                                <div class="col-md-9">
                                <input type="file" name="file[]" multiple/></td>
                                <!-- <input type="file" class="form-control" style="padding-bottom: 40px;" name="gambar" id="fileToUpload" onchange="readURL(this);"> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="../uploads/no.png" id="blah" height='100' width='200' alt="Preview" class="img-thumbnail rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                            <?php
                                while($dataKategori=mysqli_fetch_array($getKategori)){
                                    ?>
                                        <option onclick="showKategoriA(this.value)" value="<?php echo $dataKategori['id'] ?>"><?php echo $dataKategori['nama'] ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="txtKategoriA"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Judul/Merek</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul/Merk">
                        </div>
                        <div class="box-body pad">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea id="editor1" name="ket" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" name="simpan" >Simpan</button>
                    </div>
                </div>
            </form>
            <!-- End Input Form -->
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
<?php
include "footer.php";
?>