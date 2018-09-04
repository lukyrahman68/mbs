<?php
require_once "config/database.php";
include "header.php";

$getservices=mysqli_query($db,"select p.judul,p.isi,m.gambar from post p join media m on p.id_media=m.id
join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%services%'");
$getbusiness=mysqli_query($db,"select p.judul,p.isi,p.idpost from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%business%'");
$getCar=mysqli_query($db,"select p.judul,p.isi,m.gambar from post p join media m on p.id_media=m.id
join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%carousel%'");
$getCarDesc=mysqli_query($db,"select p.judul,p.isi,m.gambar from post p join media m on p.id_media=m.id
join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%carousel%'");
$getcustomer=mysqli_query($db,"select m.gambar from post p join media m on p.id_media=m.id
join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%customer%'");
$getnews=mysqli_query($db,"select p.judul,p.isi,m.gambar,p.datecreate,n.role from post p join media m on p.id_media=m.id join site s on p.id_site=s.id 
join user n on p.createby=n.id where s.site like '%news%' order by p.datecreate asc");
?>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
      <?php
      $idx=1;
        while($dataCar = mysqli_fetch_array($getCar)){
          ?>
            <img src="uploads/data/<?php echo $dataCar[2] ?>" alt="" title="#slider-direction-<?php echo $idx ?>" height="600px" />
          <?php
          $idx++;
        }
      ?>
      </div>

      <!-- direction 1 -->
      <?php
      $idx1=1;
        while($dataCarDesc = mysqli_fetch_array($getCarDesc)){
          ?>
            <div id="slider-direction-<?php echo $idx1 ?>" class="slider-direction slider-one">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content">
                      <!-- layer 1 -->
                      <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2 class="title1"><?php echo $dataCarDesc[0] ?></h2>
                      </div>
                      <!-- layer 2 -->
                      <div class="layer-1-1 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s" style="color:#fff !important;">
                        <h2 class="title2"><?php echo $dataCarDesc[1] ?></h2>
                      </div>
                      <!-- layer 3 -->
                      <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                        <a class="ready-btn page-scroll" href="#about">Learn More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          $idx1++;
        }
      ?>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area --> 

  
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <div class="section-headline services-head text-center">
            <h2>Find Your Business</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
           <?php
        while($data1=mysqli_fetch_array($getbusiness)){
          if($data1[2]=="18"){
            $link = "solution.php";
          }elseif($data1[2]=="19"){
            $link = "access_visitor.php";
          }else{
            $link = "dealer_scheme.php";
          }
        ?>
          <div class="col-md-4 col-sm-4 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <div class="services-icon">
											<i class="fa fa-code"></i>
                    </div>
										<a href="<?php echo $link; ?>">
                  <h4><?php echo $data1['judul'];?></h4></a>
                  <p>
                    <?php echo $data1['isi'];?>
                  </p>

                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <?php
        }
        ?>
          </div>
        </div>
      </div>
    </div>



<div id="about" class="about-area area-padding ">
    <div class="container">
      <div class="row">
        <?php
        while($data=mysqli_fetch_array($getservices)){
        ?>
        <div class="col-md-6 col-sm-6 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                  <img src="uploads/data/<?php echo $data['gambar'];?>" alt="">
                </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head"><?php echo $data['judul'];?></h4>
              </a>
              <p>
              <?php echo $data['isi'];?>
              </p>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
      </div>
    </div>
  </div>

  <!-- End Service area -->
<div class="wellcome-area">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="wellcome-text">
              <div class="well-text text-center">
                <h2>Your Trusted Security Technology Partner</h2>
                <p>
                  Working with Us, we provide your solution and security equipment 
                </p>
                 <a href="#contact" class="ready-btn">Contact us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
 <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <div class="section-headline services-head text-center">
            <h2>Our Loyal Customers </h2>
            <div id="logos">
  <ul>
    <?php while($datacust = mysqli_fetch_array($getcustomer)){
          ?>
    <li><img src="uploads/data/<?php echo $datacust[0];?>" width="200px"/></li>
     <?php
}
  ?>
  </ul>
</div>
          </div>
        </div>
      </div>


  <!-- our-skill-area end -->

  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
        <?php 
            while ($datanews=mysqli_fetch_array($getnews)) {
               $panjang=300;
               $text=$datanews[1];
               $cetak = substr($text, 0, $panjang);
              ?>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
               <a href="blog-details.html">
                      <img src="uploads/data/<?php echo $datanews[2];?>" alt="">
                    </a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
                      <i class="fa fa-pencil-square-o"></i>
                      <?php echo $datanews[4];?>
                    </span>
                <span class="date-type">
                      <i class="fa fa-calendar"></i><?php echo $datanews[3];?>
                    </span>
              </div>
              <div class="blog-text">
                <h4>
                      <a href="#"><?php echo $datanews[0];?></a>
                    </h4>
                <p>
                   <?php echo $cetak;?>........
                </p>
              </div>
              <span>
                  <a href="blog.html" class="ready-btn">Read more</a>
                </span>
            </div>
            <!-- Start single blog -->
          </div>
           <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
 <?php
 include "footer.php";
 ?>