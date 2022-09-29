<?php
	$prixTotal = 0;
	foreach( $lesProduitsDuPanier as $unProduit)
	{
		$id = $unProduit['id_Prod'];
		$nom = $unProduit['nom_Prod'];
		$description = $unProduit['description'];
		$image = $unProduit['image_Prod'];
		$prix = $unProduit['prix'];
		$nom = mb_strtoupper($nom,'UTF-8');

	  ?>
		<p>
			<img src="<?=$image?>" alt=image width=100	height=100 />
			<?=$nom." | ".$description." $prix Euros";
			$prixTotal += $prix;
			 ?>
			 <a href="index.php?uc=gererPanier&produit=<?=$id?>&action=supprimerProduit">Retire produit </a>
		</p>
		<?php
	}
	echo 'Le total de votre panier est de '.$prixTotal.' €';
	?>
	<a href="index.php?uc=gererPanier&action=annulerPanier">
	<img src="images/AnnulerPanier.png" height="40px" width="auto" title="Vider le panier"> </a>

	<a href="index.php?uc=gererPanier&action=afficherCommande">
		<input class="favorite styled" type="button" value="Commander">
	</a>
	<br>
