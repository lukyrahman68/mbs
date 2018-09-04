<?php
    require_once "../config/database.php";
    $idkat= $_GET['id'];
    $getSub_Kategori=mysqli_query($db,"select * from sub_kategori where idkat='$idkat'");
?>
<div class="form-group">
    <label for="exampleInputPassword1">Sub-Kategori</label>
    <select name="sub_kategori" id="sub_kategori" class="form-control">
        <option value="-">-</option>
    <?php
        while($dataSub_Kategori=mysqli_fetch_array($getSub_Kategori)){
            ?>
            <option onclick="showSubKategoriA(this.value)" value="<?php echo $dataSub_Kategori['id'] ?>"><?php echo $dataSub_Kategori['nama'] ?></option>
            <?php
        }
    ?>
    </select>
</div>
<div class="form-group">
    <div id="txtSubKategoriA"></div>
</div>