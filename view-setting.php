<?php
include "connexion.php";
$id = $_GET['id'];

if (isset($_GET['delete'])) {
    $id_delete = $_GET['delete'];
    $query = "DELETE FROM `images_prd` where id_img=$id_delete ";
    $exec = mysqli_query($conn, $query);
    header('location:profile-setting.php?id=' . $id);
}


// 3- Préaparation de la requete
$query = "SELECT * FROM `produits` where id_p=$id ";

//echo $query;


// 4- Exécution de la requete
$exec = mysqli_query($conn, $query);
$array = mysqli_fetch_array($exec);

$id_p = $array['id_p'];
$libelle_p = $array['libelle_p'];
$description_p = $array['description_p'];
$prix_p = $array['prix_p'];
$id_cat = $array['id_cat'];

// Préaparation de la requete categories
$query_cat      = "SELECT * FROM `categories` where id_c=$id_cat ";
//  Exécution de la requete cat
$exec_cat = mysqli_query($conn,$query_cat);
   
    while($array = mysqli_fetch_array($exec_cat)){

$libelle_c 		= $array['libelle_c'];

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

    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">

    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>

    <header id="header-wrap">

       <?php include "navbar.php"; ?>

    </header>


    <div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Details</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-padding">
        <div class="container">

            <div class="product-info row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="ads-details-wrapper">
                    <?php
						
                        $query_img 		= "SELECT * FROM `images_prd` where id_prd=$id_p ";
                        $exec_img 		= mysqli_query($conn,$query_img);
                        while($array_img 		= mysqli_fetch_array($exec_img)){
                        $libelle_img 	= $array_img['libelle_img'];
                        $id_img 	= $array_img['id_img'];
                        ?>

                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="product-img">
                                    <img class="img-fluid" src="tailwind/uploads/produits/<?php echo $libelle_img; ?>" alt="<?php echo $libelle_p; ?>"  alt="">
                                </div>
                                <span class="price"><?php echo $prix_p; ?></span>
                            </div>
                            <div class="item">
                                <div class="product-img">
                                    <img class="img-fluid"src="tailwind/uploads/produits/<?php echo $libelle_img; ?>" alt="<?php echo $libelle_p; ?>"  alt="">
                                </div>
                                <span class="price"><?php echo $prix_p; ?></span>
                            </div>
                            <div class="item">
                                <div class="product-img">
                                    <img class="img-fluid" src="tailwind/uploads/produits/<?php echo $libelle_img; ?>" alt="<?php echo $libelle_p; ?>"  alt="">
                                </div>
                                <span class="price"><?php echo $prix_p; ?></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="details-box">
                        <div class="ads-details-info">
                            <h2><?php echo $libelle_p; ?></h2>
                            <div class="details-meta">
                                <span><a href="#"><i class="lni-alarm-clock"></i> 7 Jan, 10:10 pm</a></span>
                                <span><a href="#"><i class="lni-map-marker"></i> New York</a></span>
                                <span><a href="#"><i class="lni-eye"></i> 299 View</a></span>
                            </div>
                            <p class="mb-4"><?php echo $description_p; ?></p>
                           
                        </div>
                        <div class="tag-bottom">
                            <div class="float-left">
                                <ul class="advertisement">
                                    <li>
                                        <p><strong><i class="lni-folder"></i> Categories:</strong> <a
                                                href="#"><?php echo $libelle_c;  ?></a></p>
                                    </li>
                                    <li>
                                        <p><strong><i class="lni-archive"></i> Condition:</strong> New</p>
                                    </li>
                                    <li>
                                        <p><strong><i class="lni-package"></i> Brand:</strong> <a href="#">Apple</a></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="float-right">
                                <div class="share">
                                    <div class="social-link">
                                        <a class="facebook" data-toggle="tooltip" data-placement="top" title="facebook"
                                            href="#"><i class="lni-facebook-filled"></i></a>
                                        <a class="twitter" data-toggle="tooltip" data-placement="top" title="twitter"
                                            href="#"><i class="lni-twitter-filled"></i></a>
                                        <a class="linkedin" data-toggle="tooltip" data-placement="top" title="linkedin"
                                            href="#"><i class="lni-linkedin-fill"></i></a>
                                        <a class="google" data-toggle="tooltip" data-placement="top" title="google plus"
                                            href="#"><i class="lni-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">

                    <aside class="details-sidebar">
                        <div class="widget">
                            <h4 class="widget-title">Ad Posted By</h4>
                            <div class="agent-inner">
                                <div class="agent-title">
                                    <div class="agent-photo">
                                        <a href="#"><img src="assets/img/productinfo/agent.jpg" alt=""></a>
                                    </div>
                                    <div class="agent-details">
                                        <h3><a href="#"> <?php echo $_SESSION['nom']; ?></a></h3>
                                        <h3><a href="#"> <?php echo $_SESSION['prenom']; ?></a></h3>
                                        <span><i class="lni-phone-handset"></i><?php echo $_SESSION['telephone']; ?></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Your Email">
                                <input type="text" class="form-control" placeholder="Your Phone">
                                <p>I'm interested in this property [ID 123456] and I'd like to know more details.</p>
                                <button class="btn btn-common fullwidth mt-4">Send Message</button>
                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title">More Ads From Seller</h4>
                            <ul class="posts-list">
                                <li>
                                    <div class="widget-thumb">
                                        <a href="#"><img src="assets/img/details/img1.jpg" alt="" /></a>
                                    </div>
                                    <div class="widget-content">
                                        <h4><a href="#">Little Harbor Yacht 38</a></h4>
                                        <div class="meta-tag">
                                            <span>
                                                <a href="#"><i class="lni-user"></i> Smith</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-map-marker"></i> New Your</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-tag"></i> Radio</a>
                                            </span>
                                        </div>
                                        <h4 class="price">$480.00</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <div class="widget-thumb">
                                        <a href="#"><img src="assets/img/details/img2.jpg" alt="" /></a>
                                    </div>
                                    <div class="widget-content">
                                        <h4><a href="#">Little Harbor Yacht 38</a></h4>
                                        <div class="meta-tag">
                                            <span>
                                                <a href="#"><i class="lni-user"></i> Smith</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-map-marker"></i> New Your</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-tag"></i> Radio</a>
                                            </span>
                                        </div>
                                        <h4 class="price">$480.00</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <div class="widget-thumb">
                                        <a href="#"><img src="assets/img/details/img3.jpg" alt="" /></a>
                                    </div>
                                    <div class="widget-content">
                                        <h4><a href="#">Little Harbor Yacht 38</a></h4>
                                        <div class="meta-tag">
                                            <span>
                                                <a href="#"><i class="lni-user"></i> Smith</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-map-marker"></i> New Your</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-tag"></i> Radio</a>
                                            </span>
                                        </div>
                                        <h4 class="price">$480.00</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <div class="widget-thumb">
                                        <a href="#"><img src="assets/img/details/img4.jpg" alt="" /></a>
                                    </div>
                                    <div class="widget-content">
                                        <h4><a href="#">Little Harbor Yacht 38</a></h4>
                                        <div class="meta-tag">
                                            <span>
                                                <a href="#"><i class="lni-user"></i> Smith</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-map-marker"></i> New Your</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-tag"></i> Radio</a>
                                            </span>
                                        </div>
                                        <h4 class="price">$480.00</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <div class="widget-thumb">
                                        <a href="#"><img src="assets/img/details/img5.jpg" alt="" /></a>
                                    </div>
                                    <div class="widget-content">
                                        <h4><a href="#">Little Harbor Yacht 38</a></h4>
                                        <div class="meta-tag">
                                            <span>
                                                <a href="#"><i class="lni-user"></i> Smith</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-map-marker"></i> New Your</a>
                                            </span>
                                            <span>
                                                <a href="#"><i class="lni-tag"></i> Radio</a>
                                            </span>
                                        </div>
                                        <h4 class="price">$480.00</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </aside>

                </div>
            </div>

        </div>
    </div>


    <section class="subscribes section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="subscribes-inner">
                        <div class="icon">
                            <i class="lni-pointer"></i>
                        </div>
                        <div class="sub-text">
                            <h3>Subscribe to Newsletter</h3>
                            <p>and receive new ads in inbox</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form>
                        <div class="subscribe">
                            <input class="form-control" name="EMAIL" placeholder="Enter your Email" required=""
                                type="email">
                            <button class="btn btn-common" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


   <?php include "footer.php"; ?>

    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>

    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>


    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-min.js"></script>
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

<!-- Mirrored from preview.uideck.com/items/nexusplus/ads-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Oct 2018 07:22:54 GMT -->

</html>