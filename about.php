<?php
require_once "config/database.php";
include "header.php";
$getvisi=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%visi%'");
$getmisi=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%misi%'");
$getvalue=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%value%'");
$gettentang=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%tentang%'");
?>

 <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
     <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
          	<br><br><br>
            <h2>About Us</h2>
          </div>
        </div>
      </div>
          <!-- End Right Feature -->
        </div>
      </div>
 

  <div class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<?php
            while($tentang = mysqli_fetch_array($gettentang)){
              ?>
        <h5><?php echo $tentang['judul'];?> </h5> 
       	 <p><?php echo $tentang['isi'];}?></p>
<br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="tab-menu">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
          
              <li class="active">
                <a href="#p-view-1" role="tab" data-toggle="tab">Visi</a>
              </li>
              <li>
                <a href="#p-view-2" role="tab" data-toggle="tab">Misi</a>
              </li>
              <li>
                <a href="#p-view-3" role="tab" data-toggle="tab">Value</a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="p-view-1">
              <div class="tab-inner">
                <?php
           $data = mysqli_fetch_array($getvisi);
              ?>
                <div class="event-content head-team">
                  <h4><?php echo $data['judul'];?></h4>
                  <p>
                    <?php echo $data['isi'];?>
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-2">
              <div class="tab-inner">
                 <?php
            $data2 = mysqli_fetch_array($getmisi);
              ?>
                <div class="event-content head-team">
                 <h4><?php echo $data2['judul'];?></h4>
                  <p>
                    <?php echo $data2['isi'];?>
                  </p>
                  
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-3">
              <div class="tab-inner">
                 <?php
            $data3 = mysqli_fetch_array($getvalue);
              ?>
                <div class="event-content head-team">
                  <h4><?php echo $data3['judul'];?></h4>
                  <p>
                    <?php echo $data3['isi'];?>
                  </p>
                </div>
              </div>
            
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
         <img src="img/logombs.png" alt="">
        </div>
      </div>
      <!-- end Row -->
    </div>
  </div>

<div class="founder-area">
    <div class="founder-inner area-padding">
      <img src="img/founder.png" alt="" style="background: cover;">
      
          <!-- End Right Feature -->
        </div>
      </div>
<br>
  <div class="sta-agile">
    <div class="stat-agile-info">
      <div class="container">
        <div class="stats">
          <div class="col-md-5 w3_counter_grid">
            <!-- <div class="w3_agileits_counter_grid">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div> -->
            <!-- <p class="counter">965</p> -->
            <h2 style="color:#d01d1d">OUR BRAND</h2>
            <br>
            <p style="color:#000;">
PT Media Bersama Sukses adalah distributor resmi brand Honeywell untuk mewujudkan keyakinan kami dalam memberikan peluang dan layanan bisnis terbaik untuk Anda </p>
<br>
<img src="img/other-brand.jpg" alt="" width="300px">
          </div>
          <div class="col-md-7 w3_counter_grid" align="center">
            <img src="img/Honeywell.png" alt="" width="400px" ><br><br>
            <img src="img/brand.jpg" alt="" width="650px">
          </div>
          <!-- <div class="col-md-3 w3_counter_grid">
            <div class="w3_agileits_counter_grid">
              <i class="fa fa-trophy" aria-hidden="true"></i>
            </div>
            <p class="counter">20</p>
            <h3>AWARDS</h3>
          </div> -->
          <!-- <div class="col-md-3 w3_counter_grid">
            <div class="w3_agileits_counter_grid">
              <i class="fa fa-asterisk" aria-hidden="true"></i>
            </div>
            <p class="counter">15</p>
            <h3>YEARS OF EXPERIENCE</h3>
          </div> -->
          <!-- <div class="col-md-3 w3_counter_grid">
            <div class="w3_agileits_counter_grid">
              <i class="fa fa-cog" aria-hidden="true"></i>
            </div>
            <p class="counter">24</p>
            <h3>EXPERTS</h3>
          </div> -->
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>


<?php 
include "footer.php";
?>