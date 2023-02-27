<?php
include "connexion.php";
if(isset($_GET['id'])){
$id =$_GET['id'];
$query = "DELETE FROM `categories` where id_c=$id ";
$exec = mysqli_query($conn,$query);
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
                                        <th class="border w-1/6 px-4 py-2">Description</th>
                                        <th class="border w-1/6 px-4 py-2">Image</th>
                                        <th class="border w-1/7 px-4 py-2">Status</th>
                                        <th class="border w-1/5 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
<?php
         //-1 Preparation de la requette
            $query = " SELECT * FROM `categories` ";
            
        //-2 Execution de la requette
            $exec = mysqli_query($conn,$query);
            while($array = mysqli_fetch_array($exec)){
                $id_c = $array['id_c'];
                $libelle_c = $array['libelle_c'];
                $description_c = $array['description_c'];
                $image_c = $array['image_c'];
                $id_parent = $array['id_parent'];
                
            
?>                                         
                                        <tr>
                                            <td class="border px-4 py-2"><?php echo $libelle_c; ?></td>
                                            <td class="border px-4 py-2"><?php echo substr($description_c,0,50); ?></td>
                                            <td class="border px-4 py-2">
                                            <img src="uploads/<?php echo $image_c; ?>" alt="<?php echo $libelle_c; ?>"   style="width:50px;"/>
                                            </td>
                                            
                                            <td class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                            </td>
                                            <td class="border px-4 py-2">
                                                
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="modifier-categorie.php?id=<?php echo $id_c; ?>">
                                                        <i class="fas fa-edit">Edit</i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="?id=<?php echo $id_c; ?>">
                                                        <i class="fas fa-trash">Delete</i>
                                                </a>
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