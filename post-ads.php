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
<title>RadhwenAnnounce - Classified Ads</title>

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

<?php include "navbar.php" ;?>

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