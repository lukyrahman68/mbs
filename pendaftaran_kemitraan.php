<?php
    include "header.php";
?>
<!-- <br>
<div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, delectus! Explicabo eveniet libero sapiente officia velit nesciunt ut esse labore suscipit ipsum nulla voluptate obcaecati id, fugit saepe eaque molestiae!</div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div>
<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script>
</div>
<br> -->
<div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
     <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <br><br><br>
            <h2>Pendaftaran Kemitraan</h2>
          </div>
        </div>
      </div>
          <!-- End Right Feature -->
        </div>
      </div>
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
                            <li class="active" style="color:#000">Data Perusahaan</li>
                            <li style="color:#000">Contact Person / PIC</li>
                            <li style="color:#000">Status Vendor</li>
                           
                          </ul>
                          <!-- fieldsets -->
                          <fieldset>
                            <h2 class="fs-title">Data Perusahaan</h2>
                            <input type="text" id="nama" class="form-control" placeholder="Nama Perusahaan" required >
                             <input type="text" onFocus="geolocate()" name="alamat" class="form-control" placeholder="Domisisli Perusahaan" required>
                            <input type="text" name="tlpn" class="form-control" placeholder="Telephone" required>
                            <input type="text" name="tlpn" class="form-control" placeholder="Fax" required>
                            <input type="text" name="tlpn" class="form-control" placeholder="Penanggung Jawab" required>
                            <input type="text" name="email" class="form-control" placeholder="Alamat Email" required>
                            
                            <input type="button" name="next" class="next action-button" value="Next" />
                          </fieldset>
                          <fieldset>
                            <h2 class="fs-title">Contact Person / PIC </h2>
                            <input type="text" class="form-control" name="company" placeholder="Nama" />
                            <input type="text" class="form-control" name="jabatan" placeholder="Telephone" />
                            <input type="text"class="form-control"  name="jabatan" placeholder="Email" />
                             <input type="text" onFocus="geolocate()" name="alamatC" class="form-control" placeholder="Alamat" required>
                             <input type="button" name="next" class="next action-button" value="Next" />
                                </span></button>
                          </fieldset>
                          <fieldset>
                            <h2 class="fs-title">Ststus Vendor</h2>
                            <!-- <input type="text" id="nama" class="form-control" placeholder="Nama" required > -->
                          
                            <div class="search-option">
                              <select name="jk" class="form-control"> <i class="fa fa-search"></i>
                                    <option selected disabled >---pilih vendor---</option>
                                    <option value="Installer">Installer</option>
                                    <option value="Retailer">Retailer</option>
                                    <option value="System integrator">System integrator</option>
                                    <option value="Controller">Controller</option>
                                  </select>
                            </div>
                            <input type="text" class="form-control" name="jabatan" placeholder="Produk yang dijual" />
                            <input type="text"class="form-control"  name="jabatan" placeholder="Brand / Merk" />
                             <!-- <input type="text" onFocus="geolocate()" name="alamatC" class="form-control" placeholder="Alamat" required> -->
                            <button type="submit" name="simpan" class="btn btn-primary form-control btn-login">Submit <span>
                             <i class="fas fa-arrow-circle-right"></i>
                                </span></button>
                          </fieldset>
                        </form>


<?php
    include "footer.php";
?>