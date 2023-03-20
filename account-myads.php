<?php
include "connexion.php";
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
                        <h2 class="product-title">My Ads</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">My Ads</li>
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
                                    <h3>
                                        <?php echo $_SESSION['nom']; ?>
                                        <?php echo $_SESSION['prenom']; ?>
                                    </h3>
                                    <h4>
                                        <?php echo $_SESSION['telephone']; ?>
                                    </h4>
                                    <h4>Annonceur</h4>
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
                                        <a class="active" href="account-myads.html">
                                            <i class="lni-layers"></i>
                                            <span>My Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="offermessages.html">
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
                                        <a href="privacy-setting.html">
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
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">My Ads</h2>
                            </div>
                            <div class="dashboard-wrapper">
                                <nav class="nav-table">
                                    <ul>
                                        <li class="active"><a href="#">All Ads (42)</a></li>
                                        <li><a href="#">Published (88)</a></li>
                                        <li><a href="#">Featured (12)</a></li>
                                        <li><a href="#">Sold (02)</a></li>
                                        <li><a href="#">Active (42)</a></li>
                                        <li><a href="#">Expired (01)</a></li>
                                    </ul>
                                </nav>
                                <table class="table table-responsive dashboardtable tablemyads">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkedall">
                                                    <label class="custom-control-label" for="checkedall"></label>
                                                </div>
                                            </th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Ad Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php


                                        // recuperer l id utilsateur de la session
                                        $id_user = $_SESSION['id_u'];

                                        // 3- Préaparation de la requete
                                        $query = "SELECT * FROM `produits` WHERE id_user =$id_user";

                                        //echo $query;
                                        

                                        // 4- Exécution de la requete
                                        $exec = mysqli_query($conn, $query);
                                        while ($array = mysqli_fetch_array($exec)) {

                                            $id_p = $array['id_p'];
                                            $libelle_p = $array['libelle_p'];
                                            $prix_p = $array['prix_p'];
                                            $description_p = $array['description_p'];
                                            $id_cat = $array['id_cat'];

                                            // Préaparation de la requete categories
                                            $query_cat = "SELECT * FROM `categories` where id_c=$id_cat ";
                                            //  Exécution de la requete cat
                                            $exec_cat = mysqli_query($conn, $query_cat);

                                            while ($array = mysqli_fetch_array($exec_cat)) {

                                                $libelle_c = $array['libelle_c'];

                                            }

                                            $query_img = "SELECT * FROM `images_prd` where id_prd=$id_p ";
                                            $exec_img = mysqli_query($conn, $query_img);
                                            $array_img = mysqli_fetch_array($exec_img);
                                            $libelle_img = $array_img['libelle_img'];


                                            ?>
                                            <tr data-category="active">
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="adone">
                                                        <label class="custom-control-label" for="adone"></label>
                                                    </div>
                                                </td>
                                                <td class="photo"><img class="img-fluid"
                                                        src="tailwind/uploads/produits/<?php echo $libelle_img; ?>"
                                                        alt="<?php echo $libelle_p; ?>" /></td>
                                                <td data-title="Title">
                                                    <h3>
                                                        <?php echo $libelle_p; ?>
                                                    </h3>

                                                </td>
                                                <td data-title="Category"><span class="adcategories">
                                                        <?php echo $libelle_c; ?>
                                                    </span></td>
                                                <td data-title="Ad Status"><span
                                                        class="adstatus adstatusactive">active</span></td>
                                                <td data-title="Price">
                                                    <h3>
                                                        <?php echo $prix_p; ?>
                                                    </h3>
                                                </td>
                                                <td data-title="Action">
                                                    <div class="btns-actions">
                                                        <a class="btn-action btn-view" href="view-setting.php?id=<?php echo $id_p; ?>"><i class="lni-eye"></i></a>
                                                        <a class="btn-action btn-edit" href="profile-setting.php?id=<?php echo $id_p; ?>"><i
                                                                class="lni-pencil"></i></a>
                                                        <a class="btn-action btn-delete" href="#"><i
                                                                class="lni-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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

</html>