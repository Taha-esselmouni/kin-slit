<?php
//Block 1
include"conn.php";

//Block 2
if (isset($_POST["ajouter_pass"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $adresse = $_POST["adresse"];
    $tel = $_POST["tel"];
    $prix_seance = $_POST["prix_seance"];
    $nbr_seance = $_POST["nbr_seance"];
    $diagnostique = $_POST["diagnostique"];

//Block 3
$sql ="INSERT INTO patient (nom, prenom, date_naissance, adresse, tel, prix_seance, nbr_seance, diagnostique)
VALUES ('$nom', '$prenom', '$date_naissance', '$adresse', '$tel', '$prix_seance', '$nbr_seance', '$diagnostique')";

if (mysqli_query($con, $sql)) {
    echo "<div class='alert alert-success style:padding left: 50% ;'> 
    <strong>New Reccord Added</strong>
    </div>";
    header('Location: visualisation.php');
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}

mysqli_close($con);

?>
