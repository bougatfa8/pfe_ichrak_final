<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/sortie.css">
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

        <article><h4>Sortir Produit</h4></article>
        <form action="" methode='GET'>
     <label>refP</label> 
     
     <input type="text" name="refpE"  >
     <input type="submit" value="chercher">



        </form>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion de stock psf";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
if (isset($_GET['refpE'])){
  $c=$_GET['refpE'];

    $sql = "SELECT * FROM stock where refp= '$c'  ";
    


}
else {
 
  $sql = "SELECT * FROM stock"; 

}
            
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    


            
            $result = $conn->query($sql);
         
            if ($result->num_rows > 0) {
              // output data of each row
               ?>
               <table id="customers">
                 <tr>
                <th>Ligne</th>
                <th>refp</th>
                <th>Qte_stoks</th>
                <th>Emplacement</th>
                <th>Sortie</th>
              </tr>



  <?php
            



              while($row = $result->fetch_assoc()) {
                if ( true ){

             
            ?>  
          

             
            <tr>
            <td><?php echo $row['ligne'] ;?></td>

            <td><?php echo $row['refp'] ;?></td>
            <td><?php echo $row['qte_stocke'] ;?></td>
            <td><?php echo $row['emplacement']  ;
            $id=$row['emplacement']
            ;?></td>
            
            <td width="200px"><button value="$row['emplacement']" style="width:160px;text-decoration: none;
    color: #cccccc;
    background-color: #a71414;
    border-radius: 10px;
    border: 4px double #cccccc;
    color: #eeeeee;
   margin-top: 20px;
   margin-left: 20px;" id="$id" >supprimer</button></td>
</td>
            
            </tr>     
          
                                               <?php
            }
           
            
              
            }
            } else {

              header("Location: http://localhost/pfe/sortie.php?"); 
            }
            $conn->close();
        }
            ?>
        </section>
    </body>
</html>
