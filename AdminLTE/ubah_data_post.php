<?php
require_once "../config/database.php";
include "header.php";
$idpost=$_GET['id'];
$site=$_GET['site'];
$getkategori=mysqli_query($db,"select id,kategori from post_kategori where id_site='$site'");   
$getidpost=mysqli_query($db,"select p.idpost from post p join media m on p.id_media=m.id where p.idpost='$idpost'");
  while($row = mysqli_fetch_array($getidpost))
          {
            if($idpost==$row['idpost'])
            {   
                @$un=1;
            } 
          }
  if(@$un=='1'){
    $getpost=mysqli_query($db,"select p.judul,p.isi, m.gambar, pk.kategori from post p join media m on p.id_media=m.id join post_kategori pk ON pk.id=p.id_postkat where p.idpost='$idpost'");
  }
  else{
    $getpost=mysqli_query($db,"select p.judul,p.isi, m.gambar, pk.kategori from post p join post_kategori pk ON pk.id=p.id_postkat where p.idpost='$idpost'");
  }


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data
   <!--      <small>advanced tables</small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
     
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
                    <?php }elseif($status== 5){?>
                        <div class="alert alert-danger"><?php echo @$_GET['msg'] ?></div>
                    <?php }
            ?>
          <!-- Input form -->
          <?php 
          while($datapost=mysqli_fetch_array($getpost))
          {
            ?>  
          <form action="proses_simpan_data.php?kat=<?php echo $site;?>&&id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                    <!-- <div class="col-md-6">
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
                            <img src="../uploads/no.png" id="blah" height='400' width='800' alt="Preview" class="img-thumbnail rounded">
                        </div>
                    </div> -->
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $datapost['judul'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                             <select name="postkat" id="postkat" class="form-control">
                            <?php
                            
                              while($data1 = mysqli_fetch_array($getkategori)){
                                  ?>
                                  <option value="<?php echo $data1['id'] ?>" <?php if($data1['kategori']==$datapost['kategori']) echo 'selected'; ?>><?php echo $data1['kategori'] ?></option>
                                  
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select name="status"class="form-control">
                                <option value="Diterbitkan">Diterbitkan</option>
                                <option value="Konsep">Konsep</option>
                              </select>
                        </div>
                      </div>
                        <div class="box-body pad">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea id="editor1" name="ket" rows="10" cols="80"><?php echo $datapost['isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                            <?php
                                if(@$datapost['gambar']!=""){
                            ?>
                                <img src="../uploads/data/<?php echo $datapost['gambar'] ?>" id="blah" height='200' width='200' alt="Preview" class="img-thumbnail rounded">
                            <?php
                                }else{
                            ?>
                            <img src="../uploads/no.png" id="blah" height='200' width='200' alt="Preview" class="img-thumbnail rounded">
                            <?php
                                }
                            ?>
                        </div>
                      </div>
                        <div class="form-group">
                          <div class="col-md-9">
                                <input type="file" class="form-control" style="padding-bottom: 40px;" name="gambar" id="fileToUpload" onchange="readURL(this);">
                                </div>
                      </div>
              <?php
            }
            ?>
                    <br><br><br><br>
                        <button class="btn btn-sm btn-primary" name="Ubah" >Ubah</button>
            </form> 
        </div>
      </div>
    </section>
  </div>

<?php
include "footer.php";
?>
