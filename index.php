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
    	<h1>la liste de tous les users</h1>
    	<p>
    	Nous avons actuellement <?php echo $listeUsers->rowCount(); ?> 
    	Users<?php if($listeUsers->rowCount() > 1) echo 's'; ?>
        enregistre<?php if($listeUsers->rowCount() > 1) echo 's'; ?>	
        </p>

        <?php
        //si on a au moins un film, on affiche la liste
          if($listeUsers->rowCount() > 0){ ?>
          	<ul>
          		<?php //on bouvle pour chaque film trouve
          		foreach ($tUsers as $value) {?>
          			<li>
          				<a>
                    <?php echo $value['id_employes'];?>
          					<?php echo $value['nom'];?>
                              <?php echo $value['prenom'];?>
          				</a>
        
          			</li>
          		 <?php  }?>
          	</ul>
          
         <?php } //fin du if ?>

    </article>
</body>
</html>