<?php
// 1- Récuperations des variables

$mail= $_POST['email'];
$pass = $_POST['password'];

// 2- Connexion au serveur + base de donnée

$conn = mysqli_connect('localhost','root','','project');

// 3- préparation de la requette

$query = " SELECT * FROM `users` WHERE email='$mail' and motdepasse='$pass' ";

if ($conn->query($query) === TRUE) {
    echo "WELCOME";
    header("location:index.php");
} else {
    header("location:login.php?error=1");
    echo "ERROR! USERNAME OR PASSWORD IS INCORRECT";
    
};

// 5-- Exécution de la requette
$exec = mysqli_query($conn,$query);

// 5- vérification
$num = mysqli_num_rows($exec);
if($num == 1){
    session_start();
	$_SESSION['auth'] = true;
	
	$array = mysqli_fetch_array($exec);
    $nom = $array['nom'];
    $prenom = $array['prenom'];
    $tel = $array['telephone'];
    $id_user = $array['id_u'];
    
    
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
	$_SESSION['telephone'] = $tel;
    $_SESSION['id_u'] = $id_user;
	header("location:account-myads.php");
} /*else{
	header("location:index.php?error=1");
	echo "Merci de vérifier vos accés !!!!";
} */

?>