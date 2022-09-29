<link rel="stylesheet" href="../modele/cssGeneral.css">

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Peau
	</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?php
			$lesPeaux = $pdo->getLesTypeDePeau();
			foreach( $lesPeaux as $unType)
			{
				$typePeau = $unType['type_Peau'];
				$libelle = $unType['libelle'];
				?>
					<a class="dropdown-item" href=index.php?uc=voirSoins&marque=<?=$marque?>&peau=<?=$typePeau?>&action=voirProduitsParPeauMarque><?=$libelle ?></a>
			<?php
			}
			?>
	</div>
</li>

<div class="produit">
	<div class="container">
		<div class="row">
		<?php
		foreach( $lesProduits as $unProduit)
		{
			$id = $unProduit['id_Prod'];
			$nom = $unProduit['nom_Prod'];
			$description = $unProduit['description'];
			$prix=$unProduit['prix'];
			$image = $unProduit['image_Prod'];
			$marque = $unProduit['marque'];

			$nom = mb_strtoupper($nom, 'UTF-8');
		  ?>
			<div class="col">
				<div class="text-prod">
					<div class="pic"><a href=index.php?uc=voirSoins&soin=<?=$typeSoin?>&produit=<?=$id ?>&action=voirUnProduit>
						<img src="<?=$image ?>" alt=image height="auto" width="100px" /></a>
					</div>
					<div class="w-100"></div>
					<div class="marque">  <a class="marque" href=index.php?uc=voirSoins&marque=<?=$marque?>&action=voirLesProduitParMarque>PAR  <?=$marque?>	</a></div>
					<div class="w-100"></div>
					<div class="nom"><a class="nom" href=index.php?uc=voirSoins&soin=<?=$typeSoin?>&produit=<?=$id ?>&action=voirUnProduit><?=$nom?></a></div>
					<div class="w-100"></div>
					<div class="prix"> <?=$prix?> €</div>
					<div class="w-100"></div>
					<div class="col">
						<a href=index.php?uc=voirSoins&marque=<?=$marque?>&produit=<?=$id ?>&action=ajoutPanierMarque>
						 <input class="bouton"
							type="button"
							value="Ajouter au panier"><br>
					</div>
					</a>
				</div>
			</div>
	<?php
		}
		?>
	</div>
</div>

</div>
