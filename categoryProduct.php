<?php 

include "connexion.php";

?>
<!DOCTYPE html>
<html lang="en">


<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>RadhwenAnnounce - Classified Ads </title>

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">

<link rel="stylesheet" type="text/css" href="assets/css/color-switcher.css">

<link rel="stylesheet" type="text/css" href="assets/css/animate.css">

<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="assets/css/main.css">

<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>
<body>

<header id="header-wrap">

<?php include "navbar.php"; ?>


<div id="hero-area">
<div class="overlay"></div>
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 text-center">
<div class="contents-ctg">
<div class="search-bar">
<div class="search-inner">
<form class="search-form">
<div class="form-group inputwithicon">
<i class="lni-tag"></i>
<input type="text" name="customword" class="form-control" placeholder="Enter Product Keyword">
</div>
<div class="form-group inputwithicon">
<i class="lni-target"></i>
<div class="select">
<select>
<option value="none">All Locations</option>
<option value="none">New York</option>
<option value="none">California</option>
<option value="none">Washington</option>
<option value="none">Birmingham</option>
<option value="none">Chicago</option>
<option value="none">Phoenix</option>
</select>
</div>
</div>
<div class="form-group inputwithicon">
<i class="lni-menu"></i>
<div class="select">
<select>
<option value="none">Select Categories</option>
<option value="none">Mobiles</option>
<option value="none">Electronics</option>
<option value="none">Training</option>
<option value="none">Real Estate</option>
<option value="none">Services</option>
<option value="none">Training</option>
<option value="none">Vehicles</option>
</select>
</div>
</div>
<button class="btn btn-common" type="button"><i class="lni-search"></i> Search Now</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</header>


<div class="main-container section-padding">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
<aside>

<div class="widget_search">
<form role="search" id="search-form">
<input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="">
<button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
</form>
</div>

<div class="widget categories">
<h4 class="widget-title">All Categories</h4>
<ul class="categories-list">
<li>
<a href="#">
<i class="lni-dinner"></i>
Hotel & Travels <span class="category-counter">(5)</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-control-panel"></i>
Services <span class="category-counter">(8)</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-github"></i>
Pets <span class="category-counter">(2)</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-coffee-cup"></i>
Restaurants <span class="category-counter">(3)</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-home"></i>
Real Estate <span class="category-counter">(4)</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-pencil"></i>
Jobs <span class="category-counter">(5)</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-display"></i>
Electronics <span class="category-counter">(9)</span>
</a>
</li>
</ul>
</div>
<div class="widget">
<h4 class="widget-title">Advertisement</h4>
<div class="add-box">
<img class="img-fluid" src="assets/img/img1.jpg" alt="">
</div>
</div>
</aside>
</div>
<div class="col-lg-9 col-md-12 col-xs-12 page-content">

<div class="product-filter">
<div class="short-name">
<span>Showing (1 - 12 products of 7371 products)</span>
</div>
<div class="Show-item">
<span>Show Items</span>
<form class="woocommerce-ordering" method="post">
<label>
<select name="order" class="orderby">
<option selected="selected" value="menu-order">49 items</option>
<option value="popularity">popularity</option>
<option value="popularity">Average ration</option>
<option value="popularity">newness</option>
<option value="popularity">price</option>
</select>
</label>
</form>
</div>
<ul class="nav nav-tabs">
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
</li>
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
</li>
</ul>
</div>


<div class="adds-wrapper">
<div class="tab-content">
<div id="grid-view" class="tab-pane fade">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="featured-box">
<figure>
<span class="price-save">
30% Save
</span>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="assets/img/featured/img-1.jpg" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Electronic > </a>
<a href="#">Apple</a>
</div>
<h4><a href="ads-details.html">Canon SX Powershot ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> John Smith</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$249.00</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="featured-box">
<figure>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="assets/img/featured/img-2.jpg" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Electronic > </a>
<a href="#">Apple</a>
</div>
<h4><a href="ads-details.html">Apple Macbook Pro ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> John Smith</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$289.00</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="featured-box">
<figure>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="assets/img/featured/img-3.jpg" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Electronic > </a>
<a href="#">Apple</a>
</div>
<h4><a href="ads-details.html">Mercedes Benz E200 ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> John Smith</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$199.80</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="featured-box">
<figure>
<span class="price-save">
25% Save
</span>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="assets/img/featured/img-4.jpg" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
 <a href="#">Electronic > </a>
<a href="#">Apple</a>
</div>
<h4><a href="ads-details.html">Brown Leather Bag ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> John Smith</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$206.90</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="list-view" class="tab-pane fade active show">
<div class="row">

    <?php 
    // Préaparation de la requete categories
    try {
    // Get Id Category from Url
        if(isset($_GET['idcategory'])){
            $idcategory =$_GET['idcategory'];
        }
        // 3- Préaparation de la requete
   $query      = "SELECT * FROM `categories` Where `id_c`=$idcategory "; 
  
  } catch (Exception $query) {
      echo 'Caught exception: ',  $query->getMessage(), "\n";
  }

//  Exécution de la requete cat
$exec = mysqli_query($conn,$query);

    while($array = mysqli_fetch_array($exec)){

$id_c 		    = $array['id_c'];
$libelle_c 		= $array['libelle_c'];


    }

// 3- Préaparation de la requete
$query_cat = "SELECT * FROM `produits` where `id_cat`=$id_c  ";

//echo $query;


// 4- Exécution de la requete
$exec_cat = mysqli_query($conn,$query_cat);
while($array = mysqli_fetch_array($exec_cat)){

$id_p 			= $array['id_p'];
$libelle_p 		= $array['libelle_p'];
$prix_p 		= $array['prix_p'];
$description_p 	= $array['description_p'];
$id_cat 		= $array['id_cat'];
    

        
$query_img 		= "SELECT * FROM `images_prd` where id_prd=$id_p ";
$exec_img 		= mysqli_query($conn,$query_img);
$array_img 		= mysqli_fetch_array($exec_img);
$libelle_img 	= $array_img['libelle_img'];


?>   

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="featured-box">
<figure>
<span class="price-save">
10% Save
</span>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img src="tailwind/uploads/produits/<?php echo $libelle_img; ?>" alt="<?php echo $libelle_p; ?>" style = "max-width:100%; height:auto;"/></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#"><?php echo $libelle_c; ?> > </a>
<a href="#"><?php echo $libelle_p; ?></a>
</div>
<h4><a href="ads-details.html"><?php echo $libelle_p; ?></a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> John Smith</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc"><?php echo $description_p; ?></p>
<div class="listing-bottom">
<h3 class="price float-left"><?php echo $prix_p; ?></h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
    
   <!-- end while-->
    
          <?php } ?>
</div>
</div>
</div>
</div>


<div class="pagination-bar">
<nav>
<ul class="pagination justify-content-center">
<li class="page-item"><a class="page-link active" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
</nav>
</div>

</div>
</div>
</div>
</div>


<?php include "footer.php"; ?>


<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/color-switcher.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.min.js"></script>
<script src="assets/js/summernote.js"></script>
</body>


</html>