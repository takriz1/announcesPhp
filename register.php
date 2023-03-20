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
    <script src="assets/js/validation.js"></script>
    <style type="text/css">
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>


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
                        <h2 class="product-title">Join Us</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home /</a></li>
                            <li class="current">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="register section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>
                            Register
                        </h3>
                        <form class="login-form" action="register-a.php" method="POST" id="contactForm"
                            name="contactForm" onsubmit="return validateForm() >
                            <?php if (isset($_GET['error'])) { ?>
                                <p class=" mb-4" style="color:red;">Please Verifie your Account</p>
                            <?php } else { ?>
                                <p class="mb-4">Please sign-in to your account and start the adventure</p>
                            <?php } ?>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" id="nom" class="form-control" name="nom" placeholder="Firstname">
                                    <div class="error" id="nameErr"></div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" id="prenom" class="form-control" name="prenom"
                                        placeholder="Lastname">
                                    <div class="error" id="lastnameErr"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" id="telephone" class="form-control" name="telephone"
                                        placeholder="Phonenumber">
                                    <div class="error" id="mobileErr"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-envelope"></i>
                                    <input type="text" id="sender-email" class="form-control" name="email"
                                        placeholder="Email Address">
                                    <div class="error" id="emailErr"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <input class="form-control" id="pass" type="password" name="pass"
                                        placeholder="Enter Password">
                                    <div class="error" id="passwordErr"></div>
                                    <input class="form-control" id="confirm_pass" type="password" name="confirm_pass"
                                        placeholder="Confirm Password">
                                    <div class="error" id="retypeErr"></div>

                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkedall"
                                        name="conditions">
                                    <label class="custom-control-label" for="checkedall">By registering, you accept our
                                        Terms & Conditions</label>
                                    <div class="error" id="conditionsErr"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <span id="wrong_pass_alert"></span>
                                <div class="buttons">
                                    <button name="submit" type="submit" class="btn btn-common log-btn">
                                        Submit
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
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


</html>