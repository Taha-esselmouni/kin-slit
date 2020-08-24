
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3"  href="index.html">KinéSlit</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-white w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="passion.php">
              <span data-feather=""></span>
              Ajouter des passionnées
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="visualisation.php">
              <span data-feather=""></span>
              vusialisation des passionnées
            </a>
          </li>
       
        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>les réservation de séance</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6> -->
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
             Facture
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li> -->
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!--<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>-->
          </div>
          
        </div>
      </div>

<?php

include"conn.php";

if (isset($_GET['modifier'])) {
                      $update_patient_id = $_GET['modifier']; 
                  }
                  
                  $modifier_query = "SELECT * FROM patient WHERE id = $update_patient_id ";
                  $modifier_patient_query = mysqli_query($con,$modifier_query);
                  
                  while($row = mysqli_fetch_array($modifier_patient_query)){
                  $update_patient_id = $id = $row['id'];
                  $nom = $row['nom'];
                  $prenom = $row['prenom'];
                  $date_naissance = $row['date_naissance'];
                  $adresse = $row['adresse'];
                  $tel = $row['tel'];
                  $prix_seance = $row['prix_seance'];
                  $nbr_seance = $row['nbr_seance'];
                  $diagnostique = $row['diagnostique'];
                  }
                  
                  
                  if (isset($_POST['ajouter_pass'])) {
                      $nom = $_POST['nom'];
                      $prenom = $_POST['prenom'];
                      $date_naissance = $_POST['date_naissance'];
                      $adresse = $_POST['adresse'];
                      $tel = $_POST['tel'];
                      $prix_seance = $_POST['prix_seance'];
                      $nbr_seance = $_POST['nbr_seance'];
                      $diagnostique = $_POST['diagnostique'];
              
                  
                      //$modifier_produits = mysqli_real_escape_string($conn,$modifier_produits);
                      //$pro_images = mysqli_real_escape_string($conn,$pro_images);
                      //$desc_produit = mysqli_real_escape_string($conn,$desc_produit);
                      //$infos_produit = mysqli_real_escape_string($conn,$infos_produit);
                  
                      $query = "UPDATE patient SET nom = '$nom' , prenom ='$prenom', date_naissance = '$date_naissance', adresse = '$adresse', tel = '$tel', prix_seance = '$prix_seance', nbr_seance = '$nbr_seance', diagnostique = '$diagnostique' WHERE id = '$update_patient_id' ";
                      $modifier_table_query = mysqli_query($con,$query);
                  
                      if (!$modifier_table_query) {
                          die("QUERY FAILED". mysqli_error($con));
                      }
                      header('Location: visualisation.php');
                      
                  }
                  


                  ?>

<!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
<form action="mod-patient.php?modifier=<?php echo $update_patient_id ?>" method="post" enctype="multipart/form-data">    
     
     <!---------------------------- start first row -------------------------->
     <div class="form-row">
     <div class="form-group col-md-3">
         <label for="">Nom</label>
         <input type="text" value = "<?php echo $nom ?>" class="form-control" name="nom" required>
     </div>

     <!-- <div class="form-group">
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
     </div> -->



     <div class="form-group col-md-3">
         <label for="">Prenom</label>
         <input type="text" value = "<?php echo $prenom ?>" class="form-control" name="prenom" required>
     </div>

     <div class="form-group col-md-3">
         <label for="">Date De Naissance</label>
         <input type="Date" value = "<?php echo $date_naissance ?>" class="form-control" name="date_naissance" required>
     </div>

     <div class="form-group col-md-3">
         <label for="">Adresse</label>
         <input type="text" value = "<?php echo $adresse ?>" class="form-control" name="adresse" required>
     </div>
     </div> <!-- fin first row -->

      <!------------------------------ start second row ----------------------------->

     <div class="form-row">
     <div class="form-group col-md-4">
         <label for="">Numero De Télephone</label>
         <input type="tel" value = "<?php echo $tel ?>" class="form-control" name="tel" placeholder="06-**-**-**-**"  required>
     </div>
     
     <div class="form-group col-md-4">
         <label for="">Prix De Séance</label>
         <input type="number" value = "<?php echo $prix_seance ?>" class="form-control" name="prix_seance" required>
     </div>
     <div class="form-group col-md-4">
         <label for="">Nombre De Séance</label>
         <input type="number" value = "<?php echo $nbr_seance ?>" class="form-control" name="nbr_seance" required>
     </div>
     </div> <!-- fin first row -->

     <!------------------------------- start third row ------------------------------->
     <div class="form-row">
         <div class="form-group col-md-12">
             <label for="">Diagnostique</label>
             <textarea class="form-control "name="diagnostique" id="" cols="30" rows="5" required><?php echo $diagnostique ?></textarea>
         </div>
         </div> <!-- fin third row -->

     <div class="form-group">
         <input class="btn btn-primary" type="submit" name="ajouter_pass" value="Ajouter">
     </div>


</form>
   
 </main>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>