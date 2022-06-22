<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/inventaire.css">
        <title>inventaire</title>
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
           </ul>
        </header>
           <section>
            <article>
                <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion de stock psf";
            $s=0;
            
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
   /*         $sqlmfl = "SELECT * FROM stock where ligne ='MFL'";
            $resultmfl = $conn->query($sqlmfl);
            if ($resultmfl->num_rows > 0) {
            while($row2 = $resultmfl->fetch_assoc()) {
               $s=$s+ $row2['cadence'] / $row2['qte_stocke'];
            
            }}
            */
            
            $sql = "SELECT * FROM stock ";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
               ?>
               <table id="customers">
                 <tr>
              
                <th>refp</th>
                <th>ligne</th>
                <th>Quantité</th>

                <th>Emplacement</th>

                <th>cadence</th>
                <th>couv_ligne</th>
              </tr>
            
               <?php
            
              while($row = $result->fetch_assoc()) {
               
            
            ?>        <tr>
            <td><?php echo $row['refp'] ;?></td>
            <td><?php echo $row['ligne'] ;?></td>
            <td><?php echo $row['qte_stocke'] ;?></td>
            <td><?php echo $row['emplacement'] ;?></td>

            <td><?php echo $row['cadence'] ;?></td>
            <td><?php 
            if($row['qte_stocke']!=NULL && $row['cadence'] !=NULL)
            {
              if($row['refp']=="MFL")
              {
              echo "$s" ;
              }
              else{
            echo $row['cadence'] / $row['qte_stocke']  ;}
            }
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
           <script language="javascript">
           </script>
          
    </body>
</html>