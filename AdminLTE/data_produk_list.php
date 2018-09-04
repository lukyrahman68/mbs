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
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            
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
                                          
              <table id="dataTable" class="table table-bordered table-hover" style="text-align: center;">
              
                <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Sub-Kategori</th>
                  <th>Sub-Sub-Kategori</th>
                  <th style="width:150px;">Keterangan</th>
                  <th>Gambar</th>
                  <th>Penginput</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($db, "select b.nama,k.nama,sk.nama,ssk.sub_sub_kategori,b.ket,m.gambar,u.nama 
                  from barang b, kategori k, sub_kategori sk, sub_sub_kategori ssk,barang_media bm,media m,user u 
                  where b.idkat=k.id and b.id_sub=sk.id and b.id_sub_sub_kat=ssk.id and b.id=bm.id_barang and m.id=bm.id_media 
                  and u.id=b.id_admin");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                      <tr >
                      <td class="id_ruangan" style="display: none"><?php echo $data[4]; ?></td>
                      <td style="display: none"><?php echo $data[5]; ?></td>
                      <td><?php echo $data[0]; ?></td>
                      <td><?php echo $data[1];?></td>
                      <td><?php echo $data[2];?></td>
                      <td><?php echo $data[3];?></td>
                      <td><?php echo $data[4];?></td>
                      <td><img src="../uploads/produk/<?php echo $data[5];?>" alt="" srcset="" style="max-width:200px;max-height:400px;"></td>
                      <td><?php echo $data[6];?></td>
                      <td>
                      <a href="#detail_produk" data-toggle="modal" data-gambar="<?php echo $data[4]; ?>" class="btn btn-info btn-sm">Detail </a>    
                      <a href="ubah_data_produk.php?id=<?php echo $data[6] ?>" class="btn btn-info btn-sm">Ubah </a>
                      <a href="proses_hapus_produk.php?id=<?php echo $data[6] ?>&&id_media=<?php echo $data[7] ?>&&gambar=<?php echo $data[4] ?>" class="btn btn-danger btn-sm">Hapus </a>
                      </td>
                      </tr>
                  <?php
                    }
                  ?>
                 <!-- Modal -->
                <div class="modal fade" tabindex="-1" id="detail_produk">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="mySmallModalLabel">Detail Bukti</h4>
                    </div>
                    <div class="modal-body text-center">
                        <form action="proses_trima_pembayaran.php" method="post">
                            <img src="" id="gambar" class="rounded mx-auto d-block img-fluid" style="max-width: 500px;max-height: 850px;">
                            <input type="hidden" id="id_gambar" name="id" readonly />
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
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
