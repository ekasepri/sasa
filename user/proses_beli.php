<?php
session_start();
include('../library/koneksi.php');
$id = $_POST['id_item'];
$jumlah_barang = $_POST['jumlah_barang'];
$query = mysql_query("select * from item where id_item = '$id'");
$data = mysql_fetch_assoc($query)
?>

<form method='post' action='proses_beli_konfirmasi.php'>
	<input type='hidden' name='id_item' value='<?=$data['id_item'];?>'>
	<input type='hidden' name='id_customer' value='<?=$_SESSION['id_customer'];?>'>
  <div class="form-group">
    <label for="tipe" class="col-sm-2 control-label">TAS yang anda pilih</label>
    <div class="col-sm-10">
		<ul>
			<li>Merk			: <?=$data['merk'];?></li>
			<li>Tipe			: <?=$data['tipe'];?></li>
			<li>Warna			: <?=$data['warna'];?></li>
			<li>Harga Satuan	: <?=$data['harga'];?></li>
		</ul>
    </div>
  </div>
  <div class="form-group">
    <label for="Jumlah Barang" class="col-sm-2 control-label">Jumlah Barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='jumlah_barang' value="<?=$jumlah_barang?>" id="Jumlah Barang" placeholder="Jumlah Barang" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="total" class="col-sm-2 control-label">Total harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='total_harga' id="total" value="<?=$jumlah_barang*$data['harga'];?>" placeholder="Total harga" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="total" class="col-sm-2 control-label">Tanggal Beli</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='tanggal_beli' id="total" value="<?=date('Y-m-d');?>" readonly>
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10"> <br>
      <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
    </div>
  </div>
</form>



<script>window.location.href('index.php?menu=keranjang');</script>