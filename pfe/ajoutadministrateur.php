<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/administration.css">
        <title>administration</title>
    </head>
<body>
<header >
            <img class="logo" src="./images/logo eot.jpg" alt="">
            <ul>
              <li><a href="./inventaire.php">Inventaire</a></li>
              <li><a href="./stock.php">Stock</a></li>
              <li><a href="./entree.php">Entrée produit</a></li>
              <li><a href="./sortie.php">Sortie produit</a></li>
              <li><a href="./administration.php">Administration</a></li>
              <li><a href="./index.php">Logout</a></li>

           </ul>
        </header>
        
        
 
    
$          
           
       
        <article><h4>Ajouter Utilisateur</h4></article>
        <article>
        <form id="formu" name="formu" action="" method="get">
                <div>Matricule (*)</div><div><input type="text" name="matricule" size="4"></div>
                <div>Nom(*)</div><div><input type="text" name="nom" size="50"></div>
                <div>Prenom(*)</div><div><input type="text" name="prenom" size="50"></div>
                <div>Droit(*)</div><div><input type="text" name="droit" size="50"></div>
                <div>Email(*)</div><div><input type="text" name="email" size="50"></div>
                <div>mot de passe(*)</div><div><input type="text" name="passe" cols="8"></div>
                <div>(*) obligatoire</div>
               <div><input type="submit" name="s" value="enregistrer"></div>
            </form>

            <?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion de stock psf";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}


if (isset($_GET['s'])){
$matricule = $_GET['matricule'];
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$droit = $_GET['droit'];
$email = $_GET['email'];
$passe = $_GET['passe'];


$sql = "INSERT INTO `utilisateur` (`matricule`, `nomUt`, `prenomUt`,`droit`, `email`, `passwrd`)
VALUES ('$matricule','$nom', '$prenom', '$droit','$email', '$passe')";
$result=mysqli_query($conn, $sql);
if ($result) {
echo "Data Insered";
   header('Location: administration.php');  
} 
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);

  echo "wowooo Insered";

}


}
mysqli_close($conn);

?>
        </article>
        </section>
</body>
    </html>