<h2>Silakan Pilih Produk kami</h2>
<?php
include('../library/koneksi.php');

$query = mysql_query("select * from item");

?>

<form method='post' action='index.php?menu=keranjang'>

  <div class="form-group">
    <label for="tipe" class="col-sm-2 control-label">Pilih TAS</label>
    <div class="col-sm-10">
		<select class='form-control' name='id_item' required>
			<option value="">Pilih Tas</option>
			<?php
			while($data = mysql_fetch_assoc($query)){
				echo "<option value='".$data['id_item']."'>Merk : ".$data['merk']." ; Warna : ".$data['warna']." ; Tipe : ".$data['tipe']." ; Harga : Rp. " .$data['harga']."</option>";
			}
				
			?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="Jumlah Barang" class="col-sm-2 control-label">Jumlah Barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='jumlah_barang' id="Jumlah Barang" placeholder="Jumlah Barang">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10"> <br>
      <button type="submit" class="btn btn-success">Beli</button>
    </div>
  </div>
</form>