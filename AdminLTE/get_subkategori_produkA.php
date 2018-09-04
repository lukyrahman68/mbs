<?php
    require_once "../config/database.php";
    $idsubkat= $_GET['id'];
    $getSub_Sub_Kategori=mysqli_query($db,"select * from sub_sub_kategori where idsubkat='$idsubkat'");
?>
<div class="form-group">
    <label for="exampleInputPassword1">Sub-Kategori</label>
    <select name="sub_sub_kategori" id="sub_sub_kategori" class="form-control">
        <option value="-">-</option>
    <?php
        while($dataSub_Sub_Kategori=mysqli_fetch_array($getSub_Sub_Kategori)){
            ?>
            <option value="<?php echo $dataSub_Sub_Kategori['id'] ?>"><?php echo $dataSub_Sub_Kategori['sub_sub_kategori'] ?></option>
            <?php
        }
    ?>
    </select>
</div>