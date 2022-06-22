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
      
           // Create connection
           $conn = mysqli_connect($servername, $username, $password, $dbname);
           // Check connection
           if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
           
           }
           
        


            $sql = "SELECT * FROM produit";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
               ?>
               <table id="customers">
                 <tr>
                <th>ligne</th>
                <th>Qte_stocks</th>
                <th>couv_ligne</th>
              </tr>
          
               <?php


//principale
                $sql2 = "SELECT * FROM stock where ligne ='MFL'"; 
                $result2 = $conn->query($sql2);
                $sql3 = "SELECT * FROM stock where ligne ='MFL8'"; 
                //
                $result3 = $conn->query($sql3);
                $sql4 = "SELECT * FROM stock where ligne ='CMFB'"; 
                //
                $result4 = $conn->query($sql4);
                $i=0;
                $somme=0;
                $somme1=0;
                $somme4=0;

      
             while($row = $result->fetch_assoc()) 
//boucle al tab 1

                {
                  ?>
                  <tr>
          <td><?php echo $row['ligne'] ;?></td>
          <td>
          <?php 
        
                  while($row2 = $result2->fetch_assoc()) 
                  //boucle al tab 1
                  
                  { $somme=$somme+(int)$row2['qte_stocke'];}
                  while($row3 = $result3->fetch_assoc()) 
                                  //boucle al tab 1  
                  { $somme1=$somme1+(int)$row3['qte_stocke'];
                  $i=1;
                  }
                  //
                  while($row4 = $result4->fetch_assoc()) 
                  //boucle al tab 1  
                { $somme4=$somme4+(int)$row4['qte_stocke'];
                
                }
                //AFFICHAGE 
           
              
                if($row['ligne']=="MFL"){
                  echo $somme;

                }//
                if($row['ligne']=="MFL8"){
                  echo $somme1;

                }//
                if($row['ligne']=="CMFB"){
                  echo $somme4;

                }
          
                  
        $i=$i+1;
                  
                  ?>

        


      
        </td>
          <td><?php
          
          
          
          //CADENCE
          if($row['ligne']=="MFL"){
            echo $somme/220;

          }
          //
          if($row['ligne']=="MFL8"){
            echo $somme1/220;

          }
          if($row['ligne']=="CMFB"){
            echo $somme4/120;

          }
          
          ?></td>
                     
          </tr>                                           
          <?php
            
    
                        }
                       

               
                    
              }
            
            else {
              echo "0 results";
            }
            //$conn->close();
            ?>
                
            </table>
                </article>
            </section>
           
    </body>
</html>