<?php
include "connexion.php";

if(isset($_GET['id'])){
$id =$_GET['id'];
$query = "DELETE FROM `produits` where id_p=$id ";
$exec = mysqli_query($conn,$query);
header('location:produits.php');
}
if(isset($_GET['idstatvalid'])){
$id =$_GET['idstatvalid'];
$query = "UPDATE `produits` SET `status`=3 WHERE id_p=$id";
$exec = mysqli_query($conn,$query);
header('location:produits.php');
}
if(isset($_GET['idstatdec'])){
$id =$_GET['idstatdec'];
$query = "UPDATE `produits` SET `status`=2 WHERE id_p=$id";
$exec = mysqli_query($conn,$query);
header('location:produits.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Tables | Tailwind Admin</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <?php include "navbar.php"; ?>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <?php include "sidebar.php"; ?>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                       
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Full Table
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Libelle</th>
                                        <th class="border w-1/4 px-4 py-2">Prix</th>
                                        <th class="border w-1/6 px-4 py-2">Description</th>
                                        <th class="border w-1/6 px-4 py-2">Image</th>
                                        <th class="border w-1/7 px-4 py-2">Status</th>
                                        <th class="border w-1/5 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
<?php 
                                        
 
// 3- Préaparation de la requete
$query = "SELECT * FROM `produits`  ";

//echo $query;


// 4- Exécution de la requete
$exec = mysqli_query($conn,$query);
while($array = mysqli_fetch_array($exec)){

$id_p 			= $array['id_p'];
$libelle_p 		= $array['libelle_p'];
$prix_p 		= $array['prix_p'];
$description_p 	= $array['description_p'];
$id_cat 		= $array['id_cat'];
$status         = $array['status'];
    
  


$query_img 		= "SELECT * FROM `images_prd` where id_prd=$id_p ";
$exec_img 		= mysqli_query($conn,$query_img);
$array_img 		= mysqli_fetch_array($exec_img);
$libelle_img 	= $array_img['libelle_img'];


?>         
    <tr>
            
            <td class="border px-4 py-2"><?php echo $libelle_p; ?></td>
             <td class="border px-4 py-2"><?php echo $prix_p; ?> TND</td>
            <td class="border px-4 py-2"><?php echo substr($description_p,0,50); ?></td>
            <td class="border px-4 py-2">
            <img src="uploads/produits/<?php echo $libelle_img; ?>" alt="<?php echo $libelle_p; ?>"   style="width:80px;"/>
            </td>
            
               

<td class="border px-4 py-2">
      <?php if ($status==3): ?>
                <i class="fas fa-check text-green-500 mx-2"></i> 
    <?php elseif ($status==2): ?>
     <i class="fas fa-times text-red-500 mx-2"></i>
    <?php elseif ($status==1): ?>
     <i class="fas fa-spinner"></i>
    <?php endif ?> 
            </td>
            <td class="border px-4 py-2">

                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="modifier-produits.php?id=<?php echo $id_p; ?>">
                        <i class="fas fa-edit" style="padding-bottom:20px;"> Edit</i></a>
                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="?id=<?php echo $id_p; ?>">
                        <i class="fas fa-trash" style="padding-bottom:20px; color:red;"> Delete</i>
                </a>
                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="?idstatvalid=<?php echo $id_p; ?>">
                        <i class="fas fa-check" style="padding-bottom:20px;" value ="submit" name="submit"> Validation</i></a>
                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="?idstatdec=<?php echo $id_p; ?>">
                        <i class="fas fa-times" style="padding-bottom:20px; color:red;" value ="submit" name="submit"> Decline</i></a>
            </td>
        </tr>
                <?php } ?>
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>

</body>

</html>