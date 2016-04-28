<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
error_reporting(E_ALL);
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM item";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<button type="button" class="btn btn-primary btn-rect" data-toggle="modal" data-target="#myModal">
 <i class='icon icon-white icon-plus'></i> Tambah Item
</button>
<?php
	if(isset($_POST["user"])){
			include_once("../library/koneksi.php");
			mysql_query("insert into item set merk='".$_POST["merk"]."',tipe='".$_POST["tipe"]."', warna='".$_POST["warna"]."',harga='".$_POST["harga"]);
			echo "<meta http-equiv='refresh' content='0; url=?menu=user'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["user"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

//user(); //memanggil function user
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Item
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Merk</th>
						<th>Tipe</th>
						<th>Warna</th>
						<th>Harga</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$usSql = "SELECT * FROM item ORDER BY merk DESC LIMIT $hal, $row";
				$usQry = mysql_query($usSql, $server)  or die ("Query Item : ".mysql_error());
				$nomor  = 0; 
				while ($us = mysql_fetch_array($usQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $us['merk'];?></td>
						<td><?php echo $us['tipe'];?></td>
						<td><?php echo $us['warna'];?></td>
						<td><?php echo $us['harga'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=hapus_item&id=<?php echo $us['id_item']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a>
						  <a href="?menu=update_item&id=<?php echo $us['id_item']; ?>" class="btn btn-xs btn-success tipsy-kiri-atas" title="Update Data Ini"><i class="icon-pencil icon-white"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Item</h4>
      </div>
      <div class="modal-body">
        
		<form action="proses_tambah_item.php" method="post" class="form-signin">
			
				<input type="text" required name="merk" placeholder="Merk" class="form-control" />
				
				<select class = form-control name = "tipe" required>
					<option value = ""> Tipe </option>
					<option value = "Laki - Laki"> Male </option>
					<option value = "Perempuan"> Female </option>
					<option value = "Anak - Anak"> Children </option>
				</select>
                <input type="text" required name="warna" placeholder="Warna" class="form-control" />
				<input type="text" required name="harga" placeholder="Harga" class="form-control" />
                <br>
				
           
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
		</form>
      </div>
    </div>
  </div>
</div>