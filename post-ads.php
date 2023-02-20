<?php
include "connexion.php";

/* $family= $_POST['familyname']; 
$hisname= $_POST['name'];
$mail= $_POST['address'];
$pass = $_POST['password'];
$number = $_POST['phone'];

$conn = mysqli_connect('localhost','root','','project');

$query = " SELECT * FROM `users` WHERE email='$mail' and nom='$hisname' and prenom='$family'       and motdepasse='$pass' and telephone='$number' and role='vendor' ";
$exec = mysqli_query($conn,$query); */
						  
function categoryTree($parent_id = 0, $sub_mark = ''){
    $conn = mysqli_connect('localhost','root','','project');
    $query = $conn->query("SELECT * FROM categories WHERE id_parent = $parent_id ORDER BY libelle_c ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['id_c'].'">'.$sub_mark.$row['libelle_c'].'</option>';
            categoryTree($row['id_c'], $sub_mark.'-> ');
        }
    }
}

if(isset($_POST['submit'])){
// Recupération des variables

$lib = addslashes($_POST['lib']);
$price = addslashes($_POST['price']);
$desc = addslashes($_POST['desc']);
$idcat = addslashes($_POST['idcat']);

 




$statusMsg = '';

// File upload path
$targetDir = "uploads/produits/";


//recupérer l'id utilisateur connecté 
    $id_user = $_SESSION['id_u'];
// 3- Préaparation de la requete
$query = "INSERT INTO `produits`( `libelle_p`, `prix_p`, `id_cat`, `description_p`,`id_user`) VALUES ( '$lib',$price ,$idcat,'$desc',$id_user)";
//echo $query;
// 4- Exécution de la requete
$exec = mysqli_query($conn,$query);
$last_id = mysqli_insert_id($conn);		
$countfiles = count($_FILES['image']['name']);	
 for($i=0;$i<$countfiles;$i++){
		$fileName = basename($_FILES["image"]["name"][$i]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

		$exp = explode(".", $fileName);
		$end = end($exp);
		$name = uniqid().".".$end;
		$path = "tailwind/uploads/produits/".$name;
		// Allow certain file formats
		$allowTypes = array('jpg','png','jpeg','gif','webp');
		if(in_array($fileType, $allowTypes)){
		// Upload file to server
		if(move_uploaded_file($_FILES["image"]["tmp_name"][$i], $path)){
		// Insert image file name into database
		$statusMsg = "The file ".$name. " has been uploaded successfully.";


               // echo 'produits insirer:'.$last_id;

		
		try {
      // 3- Préaparation de la requete
$query_img = "INSERT INTO `images_prd`( `libelle_img`, `id_prd`) VALUES ( '$name','$last_id')";
            echo $query_img;
		$exec_img = mysqli_query($conn,$query_img);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
		}else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
		}
 }
 

// Display status message
//echo $statusMsg;









//header('location:index.html');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>NexusPlus - Classified Ads and Listing Template</title>

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">

<link rel="stylesheet" type="text/css" href="assets/css/color-switcher.css">

<link rel="stylesheet" type="text/css" href="assets/css/summernote.css">

<link rel="stylesheet" type="text/css" href="assets/css/animate.css">

<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="assets/css/main.css">

<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>
<body>

<header id="header-wrap">

<div class="top-bar">
<div class="container">
<div class="row">
<div class="col-lg-7 col-md-5 col-xs-12">

<ul class="list-inline">
<li><i class="lni-phone"></i> +0123 456 789</li>
<li><i class="lni-envelope"></i> <a href="http://preview.uideck.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1d6e686d6d726f695d7a707c7471337e7270">[email&#160;protected]</a></li>
</ul>

</div>
<div class="col-lg-5 col-md-7 col-xs-12">
<div class="roof-social float-right">
<a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
<a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
<a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
<a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a>
<a class="google" href="#"><i class="lni-google-plus"></i></a>
</div>
<div class="header-top-right float-right">
<a href="login.html" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
<a href="register.html" class="header-top-button"><i class="lni-pencil"></i> Register</a>
</div>
</div>
</div>
</div>
</div>


<nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
<div class="container">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="index-2.html" class="navbar-brand"><img src="assets/img/logo.png" alt=""></a>
</div>
<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto w-100 justify-content-center">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Home
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="index-2.html">Home 1</a>
<a class="dropdown-item" href="index-3.html">Home 2</a>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="category.html">
Categories
</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Listings
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="adlistinggrid.html">Ad Grid</a>
<a class="dropdown-item" href="adlistinglist.html">Ad Listing</a>
<a class="dropdown-item" href="ads-details.html">Listing Detail</a>
</div>
</li>
<li class="nav-item dropdown active">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Pages
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="about.html">About Us</a>
<a class="dropdown-item" href="services.html">Services</a>
<a class="dropdown-item" href="ads-details.html">Ads Details</a>
<a class="dropdown-item active" href="post-ads.html">Ads Post</a>
<a class="dropdown-item" href="pricing.html">Packages</a>
<a class="dropdown-item" href="testimonial.html">Testimonial</a>
<a class="dropdown-item" href="faq.html">FAQ</a>
<a class="dropdown-item" href="404.html">404</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Blog
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a>
<a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a>
<a class="dropdown-item" href="blog-grid-full-width.html"> Blog full width </a>
<a class="dropdown-item" href="single-post.html">Blog Details</a>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="contact.html">
Contact
</a>
</li>
</ul>
<div class="post-btn">
<a class="btn btn-common" href="post-ads.html"><i class="lni-pencil-alt"></i> Post an Ad</a>
</div>
</div>
</div>

<ul class="mobile-menu">
<li>
<a href="#">
Home
</a>
<ul class="dropdown">
<li><a href="index-2.html">Home 1</a></li>
<li><a href="index-3.html">Home 2</a></li>
</ul>
</li>
<li>
<a href="category.html">Categories</a>
</li>
<li>
<a href="#">
Listings
</a>
<ul class="dropdown">
<li><a href="adlistinggrid.html">Ad Grid</a></li>
<li><a href="adlistinglist.html">Ad Listing</a></li>
<li><a href="ads-details.html">Listing Detail</a></li>
</ul>
</li>
<li>
<a class="active" href="#">Pages</a>
<ul class="dropdown">
<li><a href="about.html">About Us</a></li>
<li><a href="services.html">Services</a></li>
<li><a href="ads-details.html">Ads Details</a></li>
<li><a class="active" href="post-ads.html">Ads Post</a></li>
<li><a href="pricing.html">Packages</a></li>
<li><a href="testimonial.html">Testimonial</a></li>
<li><a href="faq.html">FAQ</a></li>
<li><a href="404.html">404</a></li>
</ul>
</li>
<li>
<a href="#">Blog</a>
<ul class="dropdown">
<li><a href="blog.html">Blog - Right Sidebar</a></li>
<li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
<li><a href="blog-grid-full-width.html"> Blog full width </a></li>
<li><a href="single-post.html">Blog Details</a></li>
</ul>
</li>
<li>
<a href="contact.html">Contact Us</a>
</li>
</ul>

</nav>

</header>


<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Post you Ads</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Post you Ads</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<div id="content" class="section-padding">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
<aside>
<div class="sidebar-box">
<div class="user">
<figure>
<a href="#"><img src="assets/img/author/img1.jpg" alt=""></a>
</figure>
<div class="usercontent">
<h3>Hello William!</h3>
<h4>Administrator</h4>
</div>
</div>
<nav class="navdashboard">
<ul>
<li>
<a href="dashboard.html">
<i class="lni-dashboard"></i>
<span>Dashboard</span>
</a>
</li>
<li>
<a href="account-profile-setting.html">
<i class="lni-cog"></i>
<span>Profile Settings</span>
</a>
</li>
<li>
<a href="account-myads.html">
<i class="lni-layers"></i>
<span>My Ads</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-envelope"></i>
<span>Offers/Messages</span>
</a>
</li>
<li>
<a href="payments.html">
<i class="lni-wallet"></i>
<span>Payments</span>
</a>
</li>
<li>
<a href="account-favourite-ads.html">
<i class="lni-heart"></i>
<span>My Favourites</span>
</a>
</li>
<li>
<a href="account-profile-setting.html">
<i class="lni-star"></i>
<span>Privacy Settings</span>
</a>
</li>
<li>
<a href="#">
<i class="lni-enter"></i>
<span>Logout</span>
</a>
</li>
</ul>
</nav>
</div>
<div class="widget">
<h4 class="widget-title">Advertisement</h4>
<div class="add-box">
<img class="img-fluid" src="assets/img/img1.jpg" alt="">
</div>
</div>
</aside>
</div>
<div class="col-sm-12 col-md-8 col-lg-9">
<div class="row page-content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
<div class="inner-box">
<div class="dashboard-box">
<h2 class="dashbord-title">Ad Detail</h2>
</div>
     
<div class="dashboard-wrapper">
    <form action="" method="POST" enctype="multipart/form-data">
<div class="form-group mb-3">
<label class="control-label">Project Title</label>
<input class="form-control input-md" name="lib" placeholder="Title" type="text">
</div>
<div class="form-group mb-3 tg-inputwithicon">
<label class="control-label">Categories</label>
<div class="tg-select form-control">
<select name="idcat">
<option value="0">Select Categories</option>
            <?php categoryTree(); ?>
</select>
</div>
</div>
<div class="form-group mb-3">
<label class="control-label">Price Title</label>
<input class="form-control input-md" name="price" placeholder="Ad your Price" type="text">
</div>
<div class="form-group md-3">
<div class="note-editing-area">
<textarea class="note-editable" contenteditable="true" style="height: 250px; width: 100%;" name="desc"></textarea>
</div>
</div>
<label class="tg-fileuploadlabel" for="tg-photogallery">
<span>Drop files anywhere to upload</span>
<span>Or</span>
<span class="btn btn-common">Select Files</span>
<span>Maximum upload file size: 500 KB</span>
<input id="tg-photogallery" class="tg-fileinput" type="file" name="image[]" multiple>
</label>
</div>
</div>
</div>
    
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
<div class="inner-box">
<div class="tg-contactdetail">
<div class="dashboard-box">
<h2 class="dashbord-title">Contact Detail</h2>
</div>
<div class="dashboard-wrapper">
<div class="form-group mb-3">
<strong>I’m a:</strong>
<div class="tg-selectgroup">
<span class="tg-radio">
<input id="tg-sameuser" type="radio" name="usertype" value="same user" checked="">
<label for="tg-sameuser">Same User</label>
</span>
<span class="tg-radio">
<input id="tg-someoneelse" type="radio" name="usertype" value="someone else">
<label for="tg-someoneelse">Someone Else</label>
</span>
</div>
</div>
<div class="form-group mb-3">
<label class="control-label">First Name*</label>
<input class="form-control input-md" name="name" type="text">
</div>
<div class="form-group mb-3">
<label class="control-label">Last Name*</label>
<input class="form-control input-md" name="familyname" type="text">
</div>
<div class="form-group mb-3">
<label class="control-label">Phone*</label>
<input class="form-control input-md" name="phone" type="text">
</div>
<div class="form-group mb-3">
<label class="control-label">Enter Address</label>
<input class="form-control input-md" name="address" type="text">
</div>
<div class="form-group mb-3 tg-inputwithicon">
<label class="control-label">Country</label>
<div class="tg-select form-control">
<select>
<option value="none">Select Country</option>
 <option value="none">Country 1</option>
<option value="none">Country 2</option>
<option value="none">Country 3</option>
<option value="none">Country 4</option>
<option value="none">Country 5</option>
<option value="none">Country 6</option>
</select>
</div>
</div>
<div class="form-group mb-3 tg-inputwithicon">
<label class="control-label">State</label>
<div class="tg-select form-control">
<select>
<option value="none">Select State</option>
<option value="none">Select State</option>
<option value="none">Select State</option>
</select>
</div>
</div>
<div class="form-group mb-3 tg-inputwithicon">
<label class="control-label">City</label>
<div class="tg-select form-control">
<select>
<option value="none">Select City</option>
<option value="none">Select City</option>
<option value="none">Select City</option>
</select>
</div>
</div>
<div class="tg-checkbox">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="tg-agreetermsandrules">
<label class="custom-control-label" for="tg-agreetermsandrules">I agree to all <a href="javascript:void(0);">Terms of Use &amp; Posting Rules</a></label>
</div>
</div>
<button class="btn btn-common" type="submit" name="submit" >Post Ad</button>
</div>
</div>
</div>
</div>
</div>
   </form>
</div>
    
</div>
</div>
</div>

<footer>

<section class="footer-Content">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<div class="footer-logo"><img src="assets/img/logo.png" alt=""></div>
<div class="textwidget">
<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt consectetur, adipisci velit.</p>
</div>
<ul class="mt-3 footer-social">
<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
<li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
<li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
<li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">Quick Link</h3>
<ul class="menu">
<li><a href="#">- About Us</a></li>
<li><a href="#">- Blog</a></li>
<li><a href="#">- Events</a></li>
<li><a href="#">- Shop</a></li>
<li><a href="#">- FAQ's</a></li>
<li><a href="#">- About Us</a></li>
<li><a href="#">- Blog</a></li>
<li><a href="#">- Events</a></li>
<li><a href="#">- Shop</a></li>
<li><a href="#">- FAQ's</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">Contact Info</h3>
<ul class="contact-footer">
<li>
<strong><i class="lni-phone"></i></strong><span>+1 555 444 66647 <br> +1 555 444 66647</span>
</li>
<li>
<strong><i class="lni-envelope"></i></strong><span><a href="http://preview.uideck.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2f4c40415b4e4c5b6f424e4643014c4042">[email&#160;protected]</a> <br> <a href="http://preview.uideck.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b8cbcdc8c8d7caccf8d5d9d1d496dbd7d5">[email&#160;protected]</a></span>
</li>
<li>
<strong><i class="lni-map-marker"></i></strong><span><a href="#">9870 St Vincent Place, Glasgow, DC 45 <br>Fr 45</a></span>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>


<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info text-center">
<p><a target="_blank" href="https://templateshub.net">Templates Hub</a></p>
</div>
</div>
</div>
</div>
</div>

</footer>


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
<script>
      $('#summernote').summernote({
          height: 250, // set editor height
          minHeight: null, // set minimum height of editor
          maxHeight: null, // set maximum height of editor
          focus: false // set focus to editable area after initializing summernote
      });
    </script>
</body>

</html>