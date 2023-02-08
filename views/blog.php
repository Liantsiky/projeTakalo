<?php
    $Client = $_SESSION['idClient'];
    $activations['activation'] = "fangatahana";
    $this->load->view("entete", $activations);
    
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="http://localhost/ci306/assets/img/favicon.png" type="image/png">
	<title>Fangatahana</title>
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

<body class="blog_version">

	

    <!-- ================ Start Banner Area =================-->
    <section class="banner_area">
    </section>
    <!--================ End Banner Area ================= -->
        
    
    
    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        <?php for($i=0; $i<count($demandes); $i++) { ?>
                            <?php 
                                $this->load->model('Objets_model','Objet');
                                $objetDemandeur=$this->Objet->getObjetById($demandes[$i]['idObjetDemandeur']);
                                $objetReceveur=$this->Objet->getObjetById($demandes[$i]['idObjetReceveur']);
                                
                            ?>
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?php echo $objetDemandeur['nom']." ".$objetDemandeur['prenom'];?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?php echo $demandes[$i]['DateEnvoi']; ?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?php echo $objetDemandeur['prixEstimatif']; ?> AR<i class="lnr lnr-star-empty"></i></a></li>
                                        <!-- <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="http://localhost/ci306/assets/img/objets/<?php echo $objetDemandeur['urlPhoto']; ?>" alt="">
                                    <div class="blog_details">
                                        <a href="single-blog.html"><h2><?php echo $objetDemandeur['descriptions']; ?></h2></a>
                                        <p>Atakalo amin'ny : <span style="font-weight:bold"><?php echo $objetReceveur['descriptions']; ?></span style="font-weight:bold"> </p>
                                        <a href="<?php echo site_url('Functions/accepter/'. $demandes[$i]['idAffaire'].'/'.$_SESSION['idClient']); ?>" class="primary_btn"><span>Hanaiky</span></a>
                                        <a href="<?php echo site_url('Functions/refus/'. $demandes[$i]['idAffaire'].'/'.$_SESSION['idClient']); ?>" class="primary_btn"><span>Handaha</span></a>

                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    
    <?php
$this->load->view("footer");
?>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://localhost/ci306/assets/js/jquery-3.2.1.min.js"></script>
    <script src="http://localhost/ci306/assets/js/popper.js"></script>
    <script src="http://localhost/ci306/assets/js/bootstrap.min.js"></script>
    <script src="http://localhost/ci306/assets/js/stellar.js"></script>
    <script src="http://localhost/ci306/assets/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/isotope/isotope-min.js"></script>
    <script src="http://localhost/ci306/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="http://localhost/ci306/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="http://localhost/ci306/assets/js/mail-script.js"></script>
    <script src="http://localhost/ci306/assets/js/theme.js"></script>
</body>
</html>