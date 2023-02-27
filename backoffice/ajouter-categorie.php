<?php
include "connexion.php";

						  
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
$desc = addslashes($_POST['desc']);
$idcat = addslashes($_POST['idcat']);
 

    
 $statusMsg = '';
$statusMsgInsert = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $exp = explode(".", $fileName);
		$end = end($exp);
		$name = uniqid().".".$end;
		$path = "uploads/".$name;
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $path)){
            
            // Insert image file name into database
           $statusMsg = "The file ".$name. " has been uploaded successfully.";
		       
            try {
      // 3- Préaparation de la requete
 $query = "INSERT INTO `categories`( `libelle_c`, `description_c`, `image_c`, `id_parent`) VALUES ( '$lib','$desc','$name',$idcat)";
                
                    
                // 4- Exécution de la requete
            $exec = mysqli_query($conn,$query);
                
                
                

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
                $statusMsgInsert = $e->getMessage();
}
		 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
 
        
// Display status message
  //  echo $statusMsg;





//echo $query;



header('location:liste-categorie.php'); 
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
    <title>Forms | Tailwind Admin</title>
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
            <?php include "sidebar.php" ?>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Form Grid
                            </div>
                            <div class="p-3">
                                <form class="w-full" action="" method="POST" enctype="multipart/form-data">
                                  <div class="w-full md:w-3/3 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                                   for="grid-state">
                                                State
                                            </label>
                                        <div class="relative">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" name="idcat"
                                                        id="grid-state">
                                                    <option value="0">Choisir votre catégorie</option>
                                                    <?php categoryTree(); ?>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Libellé</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="lib" type="text" required="" placeholder="Libellé" aria-label="Name">
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Description</label>
                    <textarea class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_email" name="desc" type="text" required="" placeholder="Description" aria-label="Email"></textarea>
                </div>
                                    <div class="mt-2">
                          <label class="form-label" for="basic-default-fullname ">Image</label>
                          <input required type="file" class="form-control" id="basic-default-fullname"  name="image" />
                        </div>
                                     <button class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full mt-2" type="submit" name="submit">
                                    Valider
                                </button>
                                </form>
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