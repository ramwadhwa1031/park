<?php

$response = file_get_contents('http://103.87.24.58/stockapi/Plant');
$response = json_decode($response,true);
// $response = new SimpleXMLElement($response);
asort($response);
if(isset($_GET['debug']))
{
echo "<pre>";
print_r($response);
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Park with a Conscience </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>#more {display: none;}</style>
  </head>
  
  <body>

    <div class="container pt-5 pb-4">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<a class="navbar-brand" href="index.html">Park with <span>a Conscience</span></a>
						</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="#" class="searchform order-lg-last">
			          <div class="form-group d-flex">
			            <input type="text" class="form-control pl-3" placeholder="Search">
			            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
			          </div>
			        </form>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	        </div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">Our Story</a></li>
            <li class="nav-item"><a href="services.html" class="nav-link">Free Nusery</a></li>
	        	<li class="nav-item"><a href="gallery.html" class="nav-link">Events</a></li>
	        	<li class="nav-item"><a href="plants.php" class="nav-link">Plants</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Plants</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Plants <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
   	
		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">

        <?php if(!empty($response)) {
            foreach($response as $item){ 
              //https://drive.google.com/uc?export=view&id=0B6wwyazyzml-OGQ3VUo0Z2thdmc
              // var_dump(parse_url($item['image'], PHP_URL_QUERY));die;
              $imageParams = parse_url($item['image'], PHP_URL_QUERY);
              $explodedStr = explode("&", $imageParams);
              $imageUrl = '';
              if(isset($explodedStr[1]))
              {
                $idParams = explode("=", $explodedStr[1]);
                $imageUrl = "https://drive.google.com/uc?export=view&id=" . $idParams[1];
              }

              ?>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="plant-single.php.php?id=<?php echo $item['code']; ?>" class="block-20" style="background-image: url('<?=$imageUrl;?>');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day"><?=$item['code'];?> - <?=$item['plant_Name'];?></span>
              		</div>
              		<!-- <div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2020</span>
              			<span class="mos">January</span>
              		</div> -->
              	</div>
              	<!-- <h3 class="heading mb-0"><a href="#">All you want to know about industrial laws</a></h3> -->
                <p>यह एक बारहमासी पौधा है। पौधा घना हो जाता है और परिपक्व पौधा झाड़ी का आकार भी ले लेता है। यह पौधा 3 फीट तक बढ़ सकता है और फैल सकता है <span id="dots">...</span><span id="more">। यह सूर्य से प्यार करने वाला पौधा है और इसमें सफेद फूल खिलते हैं। हम इस पौधे को कम से कम 04 घंटे की सीधी धूप के साथ बालकनी में भी उगा सकते हैं। खिलने का समय पूरे वर्ष के लिए होता है (ठंढ, अत्यधिक ठंड को छोड़कर)। 
                  यह संयंत्र लगभग रखरखाव मुक्त है। उर्वरकों के बिना भी, यह पौधा संतोषजनक वृद्धि दिखाएगा। हालांकि, उर्वरक का उपयोग तेजी से विकास और अधिक खिलने को दर्शाता है। वायुमंडलीय आर्द्रता के निम्न स्तर (20%) के साथ भी, यह पौधा स्वस्थ रूप से विकसित होता रहता है। 
                </span>
                  </p>
                
              </div>
            </div>
          </div>
          <?php }} ?>
          </div>
    
         
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb bg-primary">
      <div class="container">
        <div class="row d-flex justify-content-center">
        	<div class="col-lg-8 py-4">
        		<div class="row">
		          <div class="col-md-6 ftco-animate d-flex align-items-center">
		            <h2 class="mb-0" style="color:white; font-size: 24px;">Subcribe to our Newsletter</h2>
		          </div>
		          <div class="col-md-6 d-flex align-items-center">
		            <form action="#" class="subscribe-form">
		              <div class="form-group d-flex">
		                <input type="text" class="form-control" placeholder="Enter email address">
		                <input type="submit" value="Subscribe" class="submit px-3">
		              </div>
		            </form>
		          </div>
	          </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4">
              <h2 class="logo"><a href="#">Park with  <span>a Conscience</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Garden a Conscience</a></li>
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Park with  mowing</a></li>
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Park with  a Conscience</a></li>
                
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>New Park with  Installation</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contact information</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Sector 7, Urban Estate, Kurukshetra</span></li>
	                <li><a href="tel:+919466137300"><span class="icon icon-phone"></span><span class="text">+919466137300</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Business Hours</h2>
              <div class="opening-hours">
              	<h4>Opening Days:</h4>
              	<p class="pl-3">
              		<span>Monday – Friday : 9am to 20 pm</span>
              		<span>Saturday : 9am to 17 pm</span>
              	</p>
              	<h4>Vacations:</h4>
              	<p class="pl-3">
              		<span>All Sunday Days</span>
              		<span>All Official Holidays</span>
              	</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

          
          </div>
        </div>
      </div>
    </footer>
    
  
    <script>
      function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");
      
        if (dots.style.display === "none") {
          dots.style.display = "inline";
          btnText.innerHTML = "Read more"; 
          moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "Read less"; 
          moreText.style.display = "inline";
        }
      }
      </script>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    
  </body>
</html> -->