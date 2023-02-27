<?php
// 1- Récuperations des variables

$mail= $_POST['username'];
$pass = $_POST['password'];

// 2- Connexion au serveur + base de donnée

$conn = mysqli_connect('localhost','root','','project');

// 3- préparation de la requette

$query = " SELECT * FROM `users` WHERE email='$mail' and motdepasse='$pass' and role='admin' ";



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
    
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
	
	header("location:dashboard.php");
}else{
	header("location:index.php?error=1");
	echo "Merci de vérifier vos accés !!!!";
}

?>