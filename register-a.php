<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    // Get the user's inputs from the form
    $first_name = $_POST["nom"];
    $last_name = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $phone_number = $_POST["telephone"];
     // Validate the user's inputs
    // Insert data into database
    $sql = "INSERT INTO `users`( `nom`, `prenom`, `email`, `motdepasse`, `telephone`, `role`)
VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', 'annonceur')";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');

    } else {
        header('location:register.php?error=1');

    }


?>