<?php
$status=$_GET['q'];
echo "hahha";
if($status=="abaout"){
?>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="jml">Upload Gambar</label>
        </div>
        <div class="col-md-9">
          <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
        </div>
      </div>
    </div>
    <div class="form-group">
      <img src="uploads/no.png" id="blah" height='100' width='200' alt="Preview" class="img-thumbnail rounded">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Judul/Merek</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul/Merk">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Judul/Merek</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul/Merk">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Judul/Merek</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul/Merk">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Judul/Merek</label>
        <textarea id="editor1" name="ket" rows="10" cols="80" class="form-control"></textarea>
    </div>
    <script>
        $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
  });
    </script>
<?php
}elseif($status=="contact"){
?>
adas
<?php
}
?>