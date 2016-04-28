<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM transaksi";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Transaksi
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama Customer</th>
						<th>Tanggal Pembelian</th>
						<th>Total Harga</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$usSql = "SELECT * FROM nota left join customer on nota.id_customer = customer.id_customer LIMIT $hal, $row";
				$usQry = mysql_query($usSql, $koneksi)  or die ("Query Item : ".mysql_error());
				$nomor  = 0; 
				while ($us = mysql_fetch_array($usQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $us['nama'];?></td>
						<td><?php echo $us['tanggal_pembelian'];?></td>
						<td><?php echo $us['total_harga'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=hapus_transaksi&id=<?php echo $us['id_transaksi']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a>
						  <a href="?menu=lihat_nota&id=<?php echo $us['id_transaksi']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title="Lihat Nota Ini"><i class="icon-search icon-white"></i></a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="6" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=obat&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>

