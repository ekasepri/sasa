<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM customer";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<button type="button" class="btn btn-primary btn-rect" data-toggle="modal" data-target="#myModal">
 <i class='icon icon-white icon-plus'></i> Tambah Customer
</button>
<?php
	if(isset($_POST["user"])){
			include_once("../library/koneksi.php");
			mysql_query("insert into customer set email='".$_POST["email"]."',password='".$_POST["pass"]."', no_telp='".$_POST["no_telp"]."',nama='".$_POST["nama"]."', alamat='".$_POST["address"]."'");
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
		Daftar User
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Email</th>
						<th>Password</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$usSql = "SELECT * FROM customer ORDER BY nama DESC LIMIT $hal, $row";
				$usQry = mysql_query($usSql, $koneksi)  or die ("Query Customer : ".mysql_error());
				$nomor  = 0; 
				while ($us = mysql_fetch_array($usQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $us['nama'];?></td>
						<td><?php echo $us['alamat'];?></td>
						<td><?php echo $us['no_telp'];?></td>
						<td><?php echo $us['email'];?></td>
						<td><?php echo $us['password'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=hapus_customer&id=<?php echo $us['id_customer']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Customer</h4>
      </div>
      <div class="modal-body">
        
		<form action="proses_tambah_customer.php" method="post" class="form-signin">
			
				<input type="text" required name="email" placeholder="Email" class="form-control" />
                <input type="password" required name="pass" placeholder="Password" class="form-control" />
				<input type="text" required name="address" placeholder="Alamat" class="form-control" />
				<input type="text" required name="no_telp" placeholder="Nomor Telepon" class="form-control" />
				<input type="text" required name="nama" placeholder="Nama Lengkap" class="form-control" />
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