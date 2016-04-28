<?php
session_start();
include('../library/koneksi.php');
$id = $_POST['id_item'];
$jumlah_barang = $_POST['jumlah_barang'];
$query = mysql_query("select * from item where id_item = '$id'");
$data = mysql_fetch_assoc($query)
?>
<?php
$_SESSION['index']++;
	$_SESSION['pembelian'][$_SESSION['index']]['id_item'] = $data['id_item'];
	$_SESSION['pembelian'][$_SESSION['index']]['merk'] = $data['merk'];
	$_SESSION['pembelian'][$_SESSION['index']]['tipe'] = $data['tipe'];
	$_SESSION['pembelian'][$_SESSION['index']]['warna'] = $data['warna'];
	$_SESSION['pembelian'][$_SESSION['index']]['jumlah_barang'] = $jumlah_barang;
	$_SESSION['pembelian'][$_SESSION['index']]['harga_satuan'] = $data['harga'];
	$_SESSION['pembelian'][$_SESSION['index']]['sub_total_harga'] = $jumlah_barang*$data['harga'];
	$_SESSION['total_harga'] = $_SESSION['total_harga']+$jumlah_barang*$data['harga'];
	
?>
<table class='table'>
	<tr>
		<th>ID Item</th><th>Merk</th><th>Jumlah Pembelian</th><th>Harga Satuan</th><th>Subtotal</th>
	</tr>
	<?php	
		foreach($_SESSION['pembelian'] as $row){
			echo "<tr><td>$row[id_item]</td><td>$row[merk]</td><td>$row[jumlah_barang]</td><td>$row[harga_satuan]</td><td>$row[sub_total_harga]</td></tr>";
		}
	?>
</table>

<a href='index.php' class='btn btn-primary'>Tambah Barang</a> <a href='proses_beli_konfirmasi.php' class='btn btn-primary'>Konfirmasi Pembelian</a> <a href='proses_batal_beli.php' class='btn btn-danger'>Batalkan Pembelian</a>