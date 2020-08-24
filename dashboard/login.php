<html>
<head><title> login </title>
<link href="dashboard.css" rel="stylesheet">
</head>
 <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">
<body>
 <div>
      <form action="index.html" method="post">
      username: <input type="text" id="user" name="username"><br/>
	    password: <input type="text"id ="pass" name="password"><br/>
      <input type="submit" value="login" name="submit"> 
 </div>
</form>
</body>
</html>
 
<?php
 
 
// parametre de connexion
$host_name = "localhost";
$database = "kinetorapie";
$db_user_name = "root";
$db_password = "taha";
// connexion
$conn = mysqli_connect($host_name, $db_user_name, $db_password, $database);
 
// initialisation
// recuperation et insertion
if (isset($_POST['submit'])) {
 
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $check = mysqli_query("SELECT * FROM user WHERE  username = '$username' and password= '$password'");
        $nb_rows = mysqli_num_rows($check);
        if ($nb_rows > 0) {
            echo "username found";
        } else {
            echo "Wrong Login/password";
        }
    } else {
        echo 'Veuillez remplir tous les champs';
    }
}
?>



