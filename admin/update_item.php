<?php
if(isset($_GET['id'])){
	include_once("../library/koneksi.php");
	$id = $_GET['id'];
	$query = mysql_query("select * from item where id_item = '$id'");
	$data = mysql_fetch_assoc($query);
	
}

?>

<form method='post' action='proses_update_item.php'>
	<input type='hidden' name='id_item' value="<?php echo $data['id_item'];?>">
	<div class="form-group">
    <label for="merk" class="col-sm-2 control-label">Merk</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='merk' id="merk" value="<?php echo $data['merk'];?>" placeholder="Merk">
    </div>
  </div>
  <div class="form-group">
    <label for="tipe" class="col-sm-2 control-label">Tipe</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='tipe' id="tipe" value="<?php echo $data['tipe'];?>" placeholder="Tipe">
    </div>
  </div>
  <div class="form-group">
    <label for="warna" class="col-sm-2 control-label">Warna</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='warna' id="warna" value="<?php echo $data['warna'];?>" placeholder="Warna">
    </div>
  </div>
  <div class="form-group">
    <label for="harga" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='harga' id="harga" value="<?php echo $data['harga'];?>" placeholder="Harga">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10"> <br>
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </div>
</form>