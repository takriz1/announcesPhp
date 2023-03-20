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

function categoryTree($idp, $parent_id = 0, $sub_mark = '')
{
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    $query = $conn->query("SELECT * FROM categories WHERE id_parent = $parent_id ORDER BY libelle_c ASC");

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {

            if ($idp == $row['id_c']) {
                $sel = "selected='selected'";
            } else {
                $sel = "";
            }
            echo '<option value="' . $row['id_c'] . '" ' . $sel . ' >' . $sub_mark . $row['libelle_c'] . '</option>';
            categoryTree($idp, $row['id_c'], $sub_mark . '- ');
        }
    }
}


if (isset($_POST['submit'])) {
    // Recupération des variables

    $lib = addslashes($_POST['lib']);
    $desc = addslashes($_POST['desc']);
    $idcat = addslashes($_POST['idcat']);
    $px = addslashes($_POST['price']);







    $statusMsg = '';



    // File upload path
    $query_up = "UPDATE `produits` SET `libelle_p`='$lib', `prix_p`='$px', `description_p`='$desc',`id_cat`='$idcat' WHERE id_p=$id ";


    $countfiles = count($_FILES['image']['name']);
    for ($i = 0; $i < $countfiles; $i++) {
        $targetDir = "tailwind/uploads/produits/";
        $fileName = basename($_FILES["image"]["name"][$i]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $exp = explode(".", $fileName);
        $end = end($exp);
        $name = uniqid() . "." . $end;
        $path = "tailwind/uploads/produits/" . $name;
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $path)) {
                // Insert image file name into database
                $statusMsg = "The file " . $name . " has been uploaded successfully.";

                // 3- Préaparation de la requete

                $query_img = "INSERT INTO `images_prd`( `libelle_img`, `id_prd`) VALUES ( '$name','$id')";
                $exec_img = mysqli_query($conn, $query_img);



            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }

    // Display status message
//echo $statusMsg;





    //echo $query_up;


    // 4- Exécution de la requete
    $exec = mysqli_query($conn, $query_up);
    header('location:account-myads.php.php');
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

       <?php include "navbar.php"; ?>

    </header>


    <div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Profile Settings</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Profile Settings</li>
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
                                        <a class="active" href="account-profile-setting.html">
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
                    <div class="row page-content">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="inner-box">
                                <div class="dashboard-box">
                                    <h2 class="dashbord-title">Ad Detail</h2>
                                </div>
                                <div class="dashboard-wrapper">
                                    <form class="w-full" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label class="control-label">Project Title</label>
                                        <input class="form-control input-md" name="lib" placeholder="Title" type="text" value="<?php echo $libelle_p; ?>">
                                    </div>
                                    <div class="form-group mb-3 tg-inputwithicon">
                                        <label class="control-label">Categories</label>
                                        <div class="tg-select form-control">
                                            <select name="idcat">
                                                <option value="0">Select Categories</option>
                                                <?php categoryTree($id_cat); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label">Price Title</label>
                                        <input class="form-control input-md" name="price" placeholder="Ad your Price"
                                            type="text" value="<?php echo $prix_p; ?>">
                                        <div class="tg-checkbox mt-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="tg-priceoncall">
                                                <label class="custom-control-label" for="tg-priceoncall">Price On
                                                    Call</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group md-3">
                                        <div class="note-editing-area">
                                            <textarea class="note-editable" contenteditable="true"
                                                style="height: 250px; width: 100%;" name="desc"><?php echo $description_p; ?></textarea>
                                        </div>
                                    </div>
                                    <figure>
                                       <input required type="file" name="image[]" multiple>
                                       <p> 
            <?php
						
$query_img 		= "SELECT * FROM `images_prd` where id_prd=$id_p ";
$exec_img 		= mysqli_query($conn,$query_img);
while($array_img 		= mysqli_fetch_array($exec_img)){
$libelle_img 	= $array_img['libelle_img'];
$id_img 	= $array_img['id_img'];
?>
            <div class="icondelete" style="float:left;width:20%;">
							<img src="tailwind/uploads/produits/<?php echo $libelle_img; ?>" alt="<?php echo $libelle_p; ?>"   style="width:150px;"/>
							<div class="">
								<a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="?id=<?php echo $id; ?>&delete=<?php echo $id_img; ?>" >
                                <i class="fas fa-trash">Delete</i>
                                </a>
                                
                        
               
							</div>
						</div>
<?php } ?>
                                    
        </p>
                                <div style="clear:both;"></div>
                                    </figure>
                                    
                                    <div class="tg-checkbox">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="tg-agreetermsandrules">
                                    <label class="custom-control-label" for="tg-agreetermsandrules">I agree
                                        to all <a href="javascript:void(0);">Terms of Use &amp; Posting
                                            Rules</a></label>
                                </div>
                                <button class="btn btn-common" type="submit" name="submit"
                                style="margin-left:330px; margin-top:40px;">Post Ad</button>
                                </div>
                                </form>
                            </div>
                           
                            </div>
                            
                                
                        </div>
                        













                    </div>
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