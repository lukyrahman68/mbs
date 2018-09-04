<?php
include "header.php";
$getKategori=mysqli_query($db,"select * from kategori");
$getSub_Kategori=mysqli_query($db,"select * from sub_kategori");
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
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                  <th>Nama Pengirim</th>
                  <th>Pesan</th>
              </tr>
                </thead>
                <tbody>
                <?php
                  $get = mysqli_query($db, "SELECT * from msg order by time desc");
                  while ($data = mysqli_fetch_array($get)) {
                  ?>
                <tr onclick="window.location='detail_pesan.php?id=<?php echo $data[0] ?>'">
                <td width="300px"><?php echo $data[1]?></td>
                <td><?php echo $data[5]?></td>
                </tr>
                <?php
                    }
                  ?>
                </tbody>
               
              </table>
            <!-- End Input Form -->
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
<?php
include "footer.php";
?>