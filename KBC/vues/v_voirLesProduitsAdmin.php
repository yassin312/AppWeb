<div id="produits">

<?php

foreach( $lesProduits as $unProduit)
{
	$id = $unProduit['id_Prod'];
	$nom = $unProduit['nom_Prod'];
	$description = $unProduit['description'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image_Prod'];
	$peau = $unProduit['type_peau'];
	$marque = $unProduit['marque'];


	$nom = mb_strtoupper($nom, 'UTF-8');
  ?>

<table  cellpadding=10 cellspacing=10>
	<tr>
		<div class="container-fluid prods">
			<div class="row">
				<div class="col-6">
					<td><img src="<?=$image ?>" alt=image height="100px" width="auto" /></td>
					<td><?=$nom?></td>
				</div>
				<div class="col-12">
					<td><?=$description ?> |</td>
					<td><?=$peau ?> |</td>
					<td><?=$marque ?> | </td>
				 	<td><?=$prix." €" ?></td>
			 	</div>

        <td><a href=index.php?uc=gererProduit&categorie=<?=$typeSoin ?>&produit=<?=$id ?>&action=vueModif>
 			 <img src="images/modifier.png" style="width:50px;" TITLE="Modifier le produit"> </td></a>

 			  <td><a href=index.php?uc=gererProduit&categorie=<?=$typeSoin ?>&produit=<?=$id ?>&action=supprimerunProduit>
 			 <img src="images/supprimer.png" style="width:50px;" TITLE="Supprimer le produit"> </td></a>
		 </div>
	</tr>
<?php
}
?>
</table>
</div>
