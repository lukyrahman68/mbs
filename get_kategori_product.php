<?php   
require_once "config/database.php"; 
    $id_ssk=$_GET['id'];
    $idkat=$_GET['idkat'];
   
    if($id_ssk=="kosong"){
        $dataProduk="and k.id='$idkat'";
    }elseif($id_ssk==0){
        $dataProduk="";
        
    }else{
        $dataProduk = "and ssk.id='$id_ssk'";
    }
    
    $query = mysqli_query($db, "select b.nama,k.nama,sk.nama,ssk.sub_sub_kategori,b.ket,m.gambar,u.nama 
    from barang b, kategori k, sub_kategori sk, sub_sub_kategori ssk,barang_media bm,media m,user u 
    where b.idkat=k.id and b.id_sub=sk.id and b.id_sub_sub_kat=ssk.id and b.id=bm.id_barang and m.id=bm.id_media 
    and u.id=b.id_admin $dataProduk ");
    while ($data = mysqli_fetch_array($query)) {
        if($idkat=="detail"){
            echo $data[0]." - ".$data[1]." - ".$data[2];
        }else{
            echo $data[1];
        }
        
    }
    if($query->num_rows === 0)
    {
        echo 'No results';
    }
?>