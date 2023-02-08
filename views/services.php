<?php
    $Client=$_SESSION['idClient'];
	$activations['activation']="entan-olona";
	$this->load->view("entete",$activations);
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Services</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://localhost/ci306/assets/css/bootstrap.css">
	<link rel="stylesheet" href="http://localhost/ci306/assets/vendors/linericon/style.css">
	<link rel="stylesheet" href="http://localhost/ci306/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://localhost/ci306/assets/vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="http://localhost/ci306/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="http://localhost/ci306/assets/vendors/nice-select/css/nice-select.css">
	<!-- main css -->
	<link rel="stylesheet" href="http://localhost/ci306/assets/css/style.css">
</head>

<body>

	<!--================ Start Header Area =================-->
	
	<!--================ End Header Area =================-->
	<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Lisitry ny entan'olona </h2>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

	<!--================Start Portfolio Area =================-->
	<section class="portfolio_area section_gap_top" id="portfolio">
        <div class="container">
    
            <div class="filters-content">
				<div class="row portfolio-grid justify-content-center">
					<?php for($i=0; $i<count($objet); $i++) { ?>
						<?php
                            $this->load->model('Objets_model','Objet');
                            $check=$this->Objet->checkEfanandefa($_SESSION['idClient'],$objet[$i]['idObjet']);
                            
                        ?>
					<div class="col-lg-4 col-md-6 all latest">
						<div class="portfolio_box">
							<div class="single_portfolio">
								<img class="img-fluid w-100" src="http://localhost/ci306/assets/img/objets/<?php echo $objet[$i]['urlPhoto']; ?>" alt="">
							</div>
							<div class="short_info">
								<h4><?php echo $objet[$i]['prixEstimatif']; ?>AR</h4>

								<p><?php echo $objet[$i]['descriptions']; ?></p>
								<?php if($check==0) { ?>
                                <a href="<?php echo site_url('Functions/demande/'. $objet[$i]['idObjet']); ?>" class="primary_btn"><span>Andefa tolo-kevitra</span></a>
								<?php } ?>
								<?php if($check==1) { ?>
								<p> Efa nandefa tolo-kevitra ianao</p>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
        </div>
    </section>
        
    <?php
		$this->load->view("footer");
	?>http://localhost/ci306/assets/
    <!--================End Footer Area =================-->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://localhost/ci306/assets/js/jquery-3.2.1.min.js"></script>
    <script src="http://localhost/ci306/assets/js/popper.js"></script>
    <script src="http://localhost/ci306/assets/js/bootstrap.min.js"></script>
    <script src="http://localhost/ci306/assets/js/stellar.js"></script>
    <script src="http://localhost/ci306/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/isotope/isotope-min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="http://localhost/ci306/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="http://localhost/ci306/assets/js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="http://localhost/ci306/assets/js/gmaps.min.js"></script>
    <script src="http://localhost/ci306/assets/js/theme.js"></script>
</body>

</html>