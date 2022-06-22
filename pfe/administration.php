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
        <a href="./ajoutadministrateur.php"><article><h4>Ajouter Utilisateur</h4></article></a>
        <section style="margin-bottom:200px">
        <h4 style="margin-left: 800px;">liste des utilisateurs</h4>
        <article>
        
 
       <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "gestion de stock psf";
          
          
          
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT * FROM utilisateur";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            // output data of each row
             ?>
            <table id="customers">
                <tr>
                <th>Id</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>prenom</th>
                <th>Droit</th>
                <th>email</th>
                <th>mot de passe</th>
                <th style="width:260px">ACTION</th>
                </tr>
<tr>
<?php
            
            while($row = $result->fetch_assoc()) {

               
            
            ?>        <tr>
            <td><?php echo $row['id_utlisateur'] ;?></td>
            <td><?php echo $row['matricule'] ;?></td>
            <td><?php echo $row['nomUt'] ;?></td>
            <td><?php echo $row['prenomUt'] ;?></td>
            <td><?php echo $row['droit'] ;?></td>
            <td><?php echo $row['email'] ;?></td>
            <td><?php echo $row['passwrd'] ;?></td>
            <td> <button style="width:160px">modifier</button>
<button style="width:160px">supprimer</button></td>
            </tr> 
            <?php
             
             ?></td>
             </tr>                                           <?php
             
               }
             } else {
               echo "0 results";
             }
             $conn->close();
             ?>
            </table>
           
        </article>
        
        
        </section>
        <footer>Crypted 2022</footer>
</body>
    </html>