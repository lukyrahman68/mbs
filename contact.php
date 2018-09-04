<?php
require_once "config/database.php";
include "header.php";
$getphone=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%phone%'");
$getalamat=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%alamat%'");
$getmail=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%email%'");
$getenqui=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%enquiries%'");
?>

 <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
     <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
          	<br><br><br>
            <h2>Visit Us</h2>
          </div>
        </div>
      </div>
          <!-- End Right Feature -->
        </div>
      </div>
 


 <div class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div id="google-map" data-latitude="-7.264514" data-longitude="112.765919"></div>

      </div>
    </div>
  </div>


<div id="contact" class="contact-area">
    <div class="contact-inner ">
      <div class="container ">
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                 <?php
        while($data=mysqli_fetch_array($getphone)){
        ?>
                <h3> <?php echo $data['judul'];?> </h3>
                <p>
                  <?php echo $data['isi'];}?>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <?php
        while($data1=mysqli_fetch_array($getmail)){
        ?>
                <h3> <?php echo $data1['judul'];?> </h3>
                <p>
                  <?php echo $data1['isi'];}?>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                 <?php
        while($data2=mysqli_fetch_array($getalamat)){
        ?>
                <h3> <?php echo $data2['judul'];?> </h3>
                <p>
                  <?php echo $data2['isi'];}?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-2 col-sm-2 col-xs-2">
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-8 col-sm-8 col-xs-8" >
           <!-- alert -->
          
            <div class="section-headline text-center" >
            <br><br><br>
            <h2> Enquiries ?</h2>
          </div>
           <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
            $status = $_GET['status'];
            if ($status == 1) {
                ?>
                    <div class="alert alert-success">Pesan Terkirim, kami akan menghubungi anda terkait balasan pesan tersebut</div>
                <?php } else if ($status == 2) {?>
                    <div class="alert alert-danger">Pesan Gagal Dikirim</div>
                <?php }
            ?>
           <?php
        while($data3=mysqli_fetch_array($getenqui)){
        ?>
            <P>
              <?php echo $data3['isi'];
            }?>
            </P>
            <br>
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="proses_send_msg.php" method="post">
                 <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                  <div class="validation"></div>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                  <input type="text" name="tlpn" class="form-control" id="tlpn" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                  <div class="validation"></div>
                </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="sbj" id="sbj" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="pesan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" name="send">Send Message</button></div>
              </form>
            </div>
          </div>
           <div class="col-md-2 col-sm-2 col-xs-2">
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
<?php 
include "footer.php";
?>