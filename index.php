<?php

include('config/settings.php');

$listeUsers = $db->prepare('SELECT id_employes, prenom, nom FROM employes');
//on execte la requete
$listeUsers->execute();


$tUsers = $listeUsers->fetchAll(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html>
<body>
   
    <article>
    	<h1>la liste de tous les employes</h1>
        <button>Ajouter</button>
    	<p>
            Nous avons actuellement <?php echo $listeUsers->rowCount(); ?> 
            employes<?php if($listeUsers->rowCount() > 1) echo 's'; ?>
        enregistre<?php if($listeUsers->rowCount() > 1) echo 's'; ?>	
        </p>

        <?php

          if($listeUsers->rowCount() > 0){ ?>

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>ACTION</th>
                </tr>
                
                <?php
          		foreach ($tUsers as $value) {?>
                  <tr>
          			<td><?php echo $value['id_employes'];?></td>
                    <td><?php echo $value['nom'];?></td>
                    <td> <?php echo $value['prenom'];?></td>
                    <td> <button>modifier</button> </td>
                    </tr>
          		 <?php  }?>
                
            </table>
          
         <?php }?>

         

    </article>
</body>
</html>