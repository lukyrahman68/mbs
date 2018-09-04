<?php
    include "header.php";
    $id=$_GET['id'];
    $getStatus = mysqli_query($db,"select * from kategori where id='$id'");
    $dataStatus=mysqli_fetch_array($getStatus);
    
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
</div>
<div class="container_product">
    <div class="sidebar_product">
        <ul class="kategori_product">
            <?php
            $getKategori = mysqli_query($db,"select * from kategori");
            while($dataKategori = mysqli_fetch_array($getKategori)){
            ?>
                <li class="aktif">
                    <span><?php echo $dataKategori['nama']; ?></span>
                    
                </li>
                <ul class="sub_product <?php if($id!=$dataKategori[0]) echo 'hidden' ?>">
                    <?php
                        $getSub = mysqli_query($db,"SELECT * from sub_kategori where idkat='$dataKategori[0]'");
                        while($dataSub = mysqli_fetch_array($getSub)){
                            ?>
                                <li class="aktif"><span><?php echo $dataSub['nama'] ?></span></li>
                                <ul class="sub_sub_product hidden">
                                <?php
                                    $getSubSub=mysqli_query($db,"select * from sub_sub_kategori where idsubkat='$dataSub[0]'");
                                    while($dataSubSub=mysqli_fetch_array($getSubSub)){
                                        ?>
                                            <li>
                                                <span onclick="showKategori('<?php echo $dataSubSub[0]; ?>','detail')"><?php echo $dataSubSub['sub_sub_kategori']; ?></span>
                                            </li>
                                        <?php
                                    }
                                ?>
                                </ul>
                            <?php
                        }
                    ?>
                </ul>
            <?php 
            }
            ?>
        </ul>
        <!-- <ul>
            
        </ul> -->
    </div>
    <div class="item_product">
        <div id="txtKategori"></div>
    </div>
</div>
<?php
    include "footer.php";
?>
<script>
$(document).ready(function () {
    $(".aktif").click(function(){
    var obj = $(this).next();
    if($(obj).hasClass("hidden")){
        $(obj).removeClass("hidden").slideDown(0);
    } else {
        $(obj).addClass("hidden").slideUp(0);
    }
 });
});
window.onload = function() {
    showKategori('kosong','<?php echo $id ?>');
  };
</script>