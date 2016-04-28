	<div id="left">
            <ul id="menu" class="collapse">
                <li class="panel <?php if(empty($_GET['menu'])){ echo "active";}?>"><a href="index.php"><i class="icon-home"></i> Home</a></li>
				<li class="<?php if(isset($_GET['menu']) && $_GET['menu']=='about'){ echo "active";}?>"><a href="?menu=about"><i class="icon-user "></i> About</a></li>
            </ul>
        </div>
		
		
		<div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
						<h1>SELAMAT DATANG</h1>
                    </div>
                </div>
                <hr/>
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						<?php
							include_once("load.php");
						?>
					</div>
                </div>
                  <!--END BLOCK SECTION -->
                <hr />
            </div>
        </div>