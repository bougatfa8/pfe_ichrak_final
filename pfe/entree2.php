<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/entree2.css">
        <title>entree</title>
    </head>é
<body>
<header >
            <img class="logo" src="./images/logo eot.jpg" alt="">
            <ul>
              <li><a href="./inventaire.php">Inventaire</a></li>
              <li><a href="./stock.php">Stock</a></li>
              <li><a href="./entree.php">Entrée produit</a></li>
              <li><a href="./sortie.php">Sortie produit</a></li>
              <li><a href="./administration.php">Administration</a></li>
           </ul>
        </header>
        <section>
        <article><h4>nouveau Produit</h4></article>
        <article>
            <form id="formu" name="formu" action="#" method="get">
                <label>refP</label><input type="text" name="refp" id="refp"></br>
                <label>Ligne</label><input type="text" name="ligne" id="ligne"></br>
                <label>Cadence</label><input type="text" name="cadence" id="cadence"></br>
                <ul class="actions">
		            <li><input type="submit" value="ajouter" class="primary" name="sub1"></li>
		            <li><input type="reset" value="annuler" /></li>
	              </ul>

            </form>
            <?php
            $dsn = 'mysql:host=localhost;dbname=gestion de stock psf';    
            $servername = "localhost";
            $username = "root";
            $password = "";
          
             //Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                         die("Connection failed: " . mysqli_connect_error());
                        }
            if(isset($_POST['sub1']))
            { 
              $refp = $_POST['refp'];
              $ligne = $_POST['ligne'];
              $cadence = $_POST['cadence'];

              $sql = "INSERT INTO produit ('', refp, ligne, cadence)
              VALUES ('$refp', '$ligne', '$cadence')";

            if (mysqli_query($conn, $sql))
             {
               header('Location: entree.php');  
             } 
            else
             {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             }

            }
            mysqli_close($conn);
            ?>
        </article>