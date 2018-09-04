<?php
require_once "config/database.php";
include "header.php";
$getoverall=mysqli_query($db,"select p.judul,p.isi from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%overall%'");
$getservices=mysqli_query($db,"select p.judul,p.isi,m.gambar,p.idpost from post p join media m on p.id_media=m.id
join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%solution%'");
$dataSolution=mysqli_fetch_array($getoverall);
?>

 <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
     <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
          	<br><br><br>
            <h2>Solution</h2>
          </div>
        </div>
      </div>
          <!-- End Right Feature -->
        </div>
      </div>



 <div id="portfolio" class="portfolio-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s" >
          <div class="section-headline text-center">
            <h2><?php echo $dataSolution[0] ?></h2>
          </div>
        </div>
      </div>
      <div class="row wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
       <p>
      <?php echo $dataSolution[1]; ?>
       </p>
     </div>
       <br><br>
        <div class="awesome-project-content wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <!-- single-awesome-project start -->
          <?php 
            while ($dataServices=mysqli_fetch_array($getservices)) {
              ?>
                <div class="col-md-4 col-sm-4 col-xs-12 design development">
                  <div class="single-awesome-project">
                    <div class="awesome-img">
                      <a href="#"><img src="uploads/data/<?php echo $dataServices[2]; ?>" alt="" /></a>
                      <div class="add-actions text-center">
                      <a href="solution_inner.php?id=<?php echo $dataServices[3]; ?>">
                        <div class="project-dec">
                      <!--     <a class="venobox" data-gall="myGallery" href="img/school.jpg"> -->
                            <h4><?php echo $dataServices[0];?></h4>                          
                        <!--  </a> -->
                        </div>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
<?php
include "footer.php";
?>