<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<!-- <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a> -->
					<h1>IT-akalo</h1>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-end">
							<li class="nav-item <?php if($activation=="tongasoa") {echo "active";} ?>"><a class="nav-link" href="<?php echo site_url('Functions/tongasoa'); ?>">Tongasoa</a></li>
							<li class="nav-item <?php if($activation=="entako")  {echo "active";} ?>"><a class="nav-link" href="<?php echo site_url('Functions/myListe/' . $_SESSION['idClient']); ?>">Entako</a></li>
							<li class="nav-item <?php if($activation=="entan-olona") {echo "active";} ?>"><a class="nav-link" href="<?php echo site_url('Functions/theirListe/' . $_SESSION['idClient']); ?>"> <?php echo"Entan'olona" ?> </a></li>
							<li class="nav-item <?php if($activation=="fangatahana") {echo "active";} ?>"><a class="nav-link" href="<?php echo site_url('Functions/mesDemandes/' . $_SESSION['idClient']); ?>">Fangatahana</a></li>
							<li class="nav-item submenu dropdown <?php if($activation=="hitady") {echo "active";} ?>">
								<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Hitady</a>
							</li>
							<li class="nav-item <?php if($activation=="lisitra") {echo "active";} ?>"><a class="nav-link" href="<?php echo site_url('Functions/lisitra'); ?>" >Lisitry ny entana</a>
							</li>
							<li class="nav-item <?php if($activation=="hivoaka") {echo "active";} ?>"><a class="nav-link" href="<?php echo site_url('Functions/deconnect'); ?>">Hivoaka</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>