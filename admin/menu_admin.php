	<div id="left">
            <ul id="menu" class="collapse">
                <li class="panel <?php if(empty($_GET['menu'])){ echo "active";}?>"><a href="index.php"><i class="icon-home"></i> Dashboard</a></li>
				<li class="<?php if(isset($_GET['menu']) && $_GET['menu']=='item'){ echo "active";}?>"><a href="?menu=item"><i class="icon-user "></i> Daftar Item</a></li>
				<li class="<?php if(isset($_GET['menu']) && $_GET['menu']=='transaksi'){ echo "active";}?>"><a href="?menu=transaksi"><i class="icon-paper-clip "></i> Daftar Transaksi</a></li>
                <li class="<?php if(isset($_GET['menu']) && $_GET['menu']=='customer'){ echo "active";}?>"><a href="?menu=customer"><i class="icon-user "></i> Daftar Customer</a></li>
            </ul>
        </div>
		
		
		<div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
						<h1>HALAMAN UTAMA ADMIN</h1>
                    </div>
                </div>
                <hr/>
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						<?php
						if($_GET["menu"]){
							include_once("load.php");
						}else{
							echo "<div class='col-lg-12'>
										<div class='panel panel-default'>
											<div class='panel-heading'>
												Tentang Aplikasi
											</div>
											<div class='panel-body'>
												<ul class='nav nav-tabs'>
													
													<li><a href='#profile' data-toggle='tab'>Profil</a>
													</li>
													<li><a href='#messages' data-toggle='tab'>Pesan</a>
													</li>
													<li><a href='#kontak' data-toggle='tab'>Kontak</a>
													</li>
												</ul>

												<div class='tab-content'>
													
													<div class='tab-pane fade' id='profile'>
														<blockquote>
															<table><tr><td align='left' width='200px'>
															Nama Aplikasi</td><td>: Aplikasi Sistem Informasi Penjualan Tas</td></tr>
															<tr><td align='left'>Nama Pembuat</td><td>: Muhammad Rizqi </td></tr>
															<tr><td align='left'>Alamat</td><td>: Pemalang, Jawa Tengah</td></tr>
															
															</table>
														</blockquote>
													</div>
													<div class='tab-pane fade' id='messages'>
														Hai.. Assalamu'alaikum WR.WB<p>
														Selamat Datang di Sistem Informasi Penjualan Tas, aplikasi ini dibuat sebagai Tugas PimpUP your Skill dalam rangkaian tatantang untuk menjadi MSP. Semoga dengan aplikasi ini bermanfaat dan juga mudah dikembangkan.<p>
														Terimakasih.. Wassalamu'alaikum WR.WB<p>
													</div>
													<div class='tab-pane fade' id='kontak'>
														Saya mengharapkan ada kritik dan saran yang membangun untuk kemajuan Sistem Informasi ini.<p>
														Anda bisa memberikan kritik dan saran di :<p>
														<img src='../img/bbm.png' class='img-responsive' alt='Inbox Facebook'/></td><td> 56FD6053</td></tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>";
						}
						?>
					</div>
                </div>
                  <!--END BLOCK SECTION -->
                <hr />
            </div>
        </div>