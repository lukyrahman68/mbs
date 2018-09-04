<?php
	require_once "config/database.php";
    include "header.php";
    $getbusiness=mysqli_query($db,"select p.judul,p.isi,p.idpost from post p join post_kategori pk on p.id_postkat=pk.id where pk.kategori like '%dealer%'");
?>

<div class="header-bg page-area" >
    <div class="home-overly"></div>
    <div class="container" >
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Be Our Partner</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Daftarkan Project Anda dan Dapatkan Harga Terbaik</h2>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="sta-agile" >
    <div class="stat-agile-info" >
      <div class="container">
        <div class="stats">
            <div id="services" class="services-area area-padding">
        <div class="col-md-12 col-sm-12 col-xs-12 wow slideInUp" data-wow-duration="1s" data-wow-delay=".1s">
          <div class="section-headline services-head text-center">
            <h2>Why Choose Us ?</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
           <?php
        while($data1=mysqli_fetch_array($getbusiness)){
        ?>
          <div class="col-md-3 col-sm-3 col-xs-12 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <div class="services-icon">
						<i class="fa fa-check-square-o"></i>
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
    <div id="services" class="services-area area-padding">
        <div class="col-md-12 col-sm-12 col-xs-12 wow slideInUp" data-wow-duration="1s" data-wow-delay=".1s">
          <div class="section-headline services-head text-center">
            <h2>Be Our Partner</h2>
          </div>
        </div>
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
           
            <br><br>
            <div class="form contact-form">
              <form action="proses_simpan_dealer.php" method="post">
              	<div class="col-md-6 col-sm-6 col-xs-12">
              	<div class="card">
					 <div class="card-header" style="background-color: #ffbfb2;color:black;">
					   Data Perusahaan
					 </div>
						 <div class="card-body">
						    <div class="form-group">
								<div class="col-md-1">
					              <i class="fa fa-bank" style="font-size:30px;color:#c53836"></i>
					            </div>
							  	<div class="col-md-11">
					            <input type="text" class="form-control" id="nmp" name="nmp" placeholder="Nama Perusahaan" value="" required>
					            </div>
					        </div>
							<div class="form-group">
			               		 <div class="col-md-1">
			                    	<i class="fa fa-map-marker" style="font-size:30px;color:#c53836"></i>
			               		 </div>
			        	   		 <div class="col-md-11">
			            	    <input type="text" class="form-control" id="almt" name="almt" placeholder="Domisili Perusahaan" value="" required>
			                	</div>
			      			</div>
			      			<div class="form-group">
			                <div class="col-md-1">
			                    <i class="fa fa-mobile-phone" style="font-size:30px;color:#c53836"></i>
			                </div>
			        	    <div class="col-md-11">
			            	    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No. Telepon" value="" required>
			                </div>
			        		</div>
			        		 <div class="form-group">
			            		<div class="col-md-1">
			               			<i class="fa fa-envelope" style="font-size:30px;color:#c53836"></i>
			            		</div>
			        			<div class="col-md-11">
			           				<input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="" required>
			           			</div>
			      			 </div>
			      			 <div class="form-group">
			            		<div class="col-md-1">
			               			<i class="fa fa-handshake-o" style="font-size:30px;color:#c53836"></i>
			            		</div>
			        			<div class="col-md-11">
			           				<input type="text" class="form-control" id="refP" name="refP" placeholder="Referensi Project" value="" required>
			           			</div>
			      			 </div>
			      			 <div class="form-group">
			            		<div class="col-md-1">
			               			<i class="fa fa-check-square" style="font-size:30px;color:#c53836"></i>
			            		</div>
			        			<div class="col-md-11">
										<label> Pilih Minat </label><br>
										<select class="js-example-tokenizer form-control" name="minat[]" multiple="multiple" required>
											<option value="CCTV">CCTV</option>
											<option value="Access Control">Access Control</option>
											<option value="Fire Alarm">Fire Alarm</option>
											<option value="PAVA">PAVA</option>
											<option value="Finger Print">Finger Print</option>
										</select>
			           			</div>
			      			 </div>
						 </div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
              	<div class="card">
					 <div class="card-header" style="background-color: #ffbfb2;color:black;">
					   Contact Person / PIC
					 </div>
						 <div class="card-body">
						    <div class="form-group">
								 <div class="col-md-1">
			                    <i class="fa fa-user" style="font-size:30px;color:#c53836"></i>
			               		 </div>
			        	    	<div class="col-md-11">
			            	    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="" required>
					        	</div>
					        </div>
							<div class="form-group">
			               		 <div class="col-md-1">
			                    <i class="fa fa-mobile-phone" style="font-size:30px;color:#c53836"></i>
			                	</div>
			        	    	<div class="col-md-11">
			            	    <input type="text" class="form-control" id="hp" name="hp" placeholder="No. Telepon" value="" required>
			               		</div>
			      			</div>
			      			<div class="form-group">
			              		<div class="col-md-1">
			                    <i class="fa fa-envelope" style="font-size:30px;color:#c53836"></i>
			                	</div>
			        	    	<div class="col-md-11">
			            	    <input type="email" class="form-control" id="mail" name="mail" placeholder="Alamat email" value="" required>
			               		</div>
			        		</div>
						 </div>
				</div>
				<div class="card">
					 <div class="card-header" style="background-color: #ffbfb2;color:black;">
					   Status Vendor

					 </div>
						 <div class="card-body">
						    <div class="form-group">
								 <div class="col-md-1">
			                    <i class="fa fa-cogs" style="font-size:30px;color:#c53836"></i>
			               		 </div>
			        	    	<div class="col-md-11">
                            <!-- <input type="text" id="nama" class="form-control" placeholder="Nama" required > -->
                          
                          			  <div class="search-option">
                           			   <select name="vendor" class="form-control"> <i class="fa fa-search" required></i>
                               				<option selected disabled >---pilih vendor---</option>
                                 			<option value="Installer">Installer</option>
                                   			<option value="Retailer">Retailer</option>
                                  			<option value="System integrator">System integrator</option>
                                   			<option value="Controller">Controller</option>
                                 		   </select>
                         			   </div>
					        	</div>
					        </div>
							<div class="form-group">
			               		 <div class="col-md-1">
			                    <i class="fa fa-cubes" style="font-size:30px;color:#c53836"></i>
			                	</div>
			        	    	<div class="col-md-11">
			            	    <input type="text" class="form-control" id="produk" name="produk" placeholder="Produk Yang Dijual" value="" required>
			               		</div>
			      			</div>
			      			<div class="form-group">
			              		<div class="col-md-1">
			                    <i class="fa fa-font" style="font-size:30px;color:#c53836"></i>
			                	</div>
			        	    	<div class="col-md-11">
			            	    <input type="text" class="form-control" id="merk" name="merk" placeholder="Brand / Merk" value="" required>
			               		</div>
			        		</div>
						 </div>
				</div>
				<br><br> 

			</div> 
                <div class="text-center">
<p>
Dengan memilih tombol simpan, anda menyatakan bahwa seluruh data yang dimaksukkan adalah benar dan dapat dipertanggung jawabkan.<br> Mohon periksa kembali kebenaran data yang anda masukkan sebelum memilih tombol simpan<br></p>
                	<button type="submit" name="send">Send Message</button></div>
              </form>
            </div>
          </div>
    </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
    include "footer.php";
?>