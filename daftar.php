<?php
  include "head.php";
  ?>

   <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="home.php">Home</a> <i class="icon-angle-right"></i></li>
                <li class="active">CCTV</li>
              </ul>
              <h2>Let's Be Our Friend</h2>
            </div>
          </div>

        </div>
      </div>
    </section>

            <?php
            $status=@$_GET['status'];
            if($status=='0'){
                echo '<div class="alert alert-danger center">Email Telah Terdaftar</div>';
            }elseif($status=='1'){
                echo '<div class="alert alert-success center">Pendaftaran Berhasil</div>';
            }elseif($status=='2'){
                echo '<div class="alert alert-danger center">Pendaftaran Gagal</div>';
            }
        ?>
     <form id="msform" method="post" action="proses/proses_simpan_pelanggan.php">
                          <!-- progressbar -->
                          <ul id="progressbar">
                            <li class="active">Personal Info</li>
                            <li>Company Info</li>
                           
                          </ul>
                          <!-- fieldsets -->
                          <fieldset>
                            <h2 class="fs-title">Your Personal Info</h2>
                            <input type="text" id="nama" class="form-control" placeholder="Nama" required >
                            <select name="jk" class="custom-select">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            </select>
                             <input type="text" onFocus="geolocate()" name="alamat" class="form-control" placeholder="Alamat" required>
                            <input type="text" name="tlpn" class="form-control" placeholder="Telephone" required>
                            <input type="text" name="email" class="form-control" placeholder="user@xample.com" required>
                            <input type="text" name="pswd" class="form-control" placeholder="password" required>
                            <input type="button" name="next" class="next action-button" value="Next" />
                          </fieldset>
                          <fieldset>
                            <h2 class="fs-title">Your Company Info</h2>
                            <input type="text" name="company" placeholder="Company Name" />
                            <input type="text" name="jabatan" placeholder="Your Position" />
                             <input type="text" onFocus="geolocate()" name="alamatC" class="form-control" placeholder="Alamat" required>
                            <button type="submit" name="simpan" class="btn btn-primary form-control btn-login">Submit <span>
                             <i class="fas fa-arrow-circle-right"></i>
                                </span></button>
                          </fieldset>
                        </form>
 <?php
  include "footer.php";
  ?>
</html>