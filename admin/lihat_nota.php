<?php
include_once("../library/koneksi.php");
$id_transaksi = $_GET['id'];
?>

<div class="panel panel-default">
	<div class="panel-heading">
		Nota #<?=$id_transaksi?>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Merk</th>
						<th>Jumlah</th>
						<th>Harga per Item</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
			<?php
				$usSql = "SELECT *,transaksi.total_harga as sub_total, nota.total_harga as total_semua FROM transaksi left join nota on nota.id_transaksi = transaksi.id_transaksi left join customer on nota.id_customer = customer.id_customer left join item on item.id_item = transaksi.id_item where transaksi.id_transaksi = '$id_transaksi'";
				$usQry = mysql_query($usSql, $koneksi)  or die ("Query Item : ".mysql_error());
				$nomor  = 1; 
				while ($us = mysql_fetch_array($usQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $us['merk'];?></td>
						<td><?php echo $us['jumlah_pembelian'];?></td>
						<td><?php echo $us['harga_per_item'];?></td>
						<td><?php echo $us['sub_total'];?></td>
						<td>
						<div class='btn-group'>
						<a href="?menu=hapus_detail&id=<?php echo $us['id_detail']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus data ini"><i class="icon-remove icon-white"></i></a>
						</div>
						</td>
					</tr>
				</tbody>
			<?php $nomor++;
				$total_semua = $us['total_semua'];
			} ?>
					<tfoot>
						<tr>
							<th colspan='4'>Total </th><th ><?php echo $total_semua;?> </th>
						</tr>
					</tfoot>
			</table>
		</div>
	</div>
</div>

