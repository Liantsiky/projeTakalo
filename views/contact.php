<?php
    $Client = $_SESSION['idClient'];
    $activations['activation'] = "entan-olona";
    $this->load->view("entete", $activations);
    $this->load->model('Objets_model');
    $myobject=$this->Objets_model->getObjetsByClientId($_SESSION['idClient']);
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Tolo-kevitra</title>
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

	
<section class="portfolio_details_area section_gap">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left_img">
                            <img class="img-fluid" src="http://localhost/ci306/assets/img/objets/<?php echo $objet['urlPhoto']; ?>" alt="">
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-5">
                        <div class="portfolio_right_text mt-30">
                            <h4 class="text-uppercase"><?php echo $objet['descriptions']; ?></h4>
                            <p>
                                <?php echo $objet['descriptions']; ?>
                            </p>
                            <ul class="list">
                                <li><span>Tompony</span>:<?php echo $objet['nom'] . " " . $objet['prenom']; ?></li>
                                <li><span>Vidiny</span>: <?php echo $objet['prixEstimatif']; ?> AR</li>
                                <li><span>Kategoria</span>: <?php echo $objet['categorie']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
               
               <div class="col-lg-9">
                   <form class="row contact_form" action="<?php echo site_url('Functions/proposition') ?>" method="get" id="contactForm" novalidate="novalidate">
                       Ilay entana hanakalozana azy:
                    <input type="hidden" value="<?php echo $objet ['idClient']; ?>" name="receveur">
                    <input type="hidden" value="<?php echo $objet ['idObjet']; ?>" name="objetReceveur">
                    <input type="hidden" value="<?php echo $_SESSION['idClient']; ?>" name="demandeur">

                   <select class="form-select" aria-label="Default select example" name="objetDemandeur">
                        <?php for($i=0; $i<count($myobject); $i++)  { ?>
                            <option value="<?php echo $myobject[$i]['idObjet']; ?>"><?php echo $myobject[$i]['descriptions']; ?></option>
                        <?php } ?>
                    </select>
                       <div class="col-md-12 text-right">
                           <button type="submit" value="submit" class="primary_btn">
                               <span>Alefa</span>
                           </button>
                       </div>
                   </form>
               </div>
           </div>
            </div>
        </div>
    </section>
    
        
    <?php
$this->load->view("footer");
?>
    
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