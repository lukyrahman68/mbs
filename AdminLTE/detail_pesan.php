<?php
include "header.php";
$id=$_GET['id'];
$getData=mysqli_query($db,"select * from msg where id='$id'");
$data=mysqli_fetch_array($getData);
$updt=mysqli_query($db,"update msg set status=1 where id=$id");
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
          <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <h4>Subject : <?php echo $data['sbj']; ?></h4>
                </div>
                <div class="pull-right">
                  <h4><?php echo $data['time'] ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5>Dari : <?php echo $data['nama']; ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5>Telphone : <?php echo $data['tlpn']; ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5>Email : <?php echo $data['email']; ?></h5>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-7">
                  <?php echo $data['pesan']; ?>
                </div>
              </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
<?php
include "footer.php";
?>
