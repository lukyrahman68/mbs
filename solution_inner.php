<?php
require_once "config/database.php";
include "header.php";
$id=$_GET['id'];
$getphone=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%solution%' and p.idpost='$id'");
// $getalamat=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%alamat%'");
// $getmail=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%email%'");
// $getenqui=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%enquiries%'");
// ?>

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
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<?php
            while($tentang = mysqli_fetch_array($getphone)){
              ?>
        <h5><?php echo $tentang['judul'];?> </h5> 
       	 <p><?php echo $tentang['isi'];}?></p>
<br>
        </div>
      </div>
            </div>
            </div>
            
<?php 
include "footer.php";
?>