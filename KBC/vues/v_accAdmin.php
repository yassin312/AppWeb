<div class="soin">
	<ul id="categ">

	<?php
	foreach( $lesSoins as $unSoin)
	{
		$idSoin = $unSoin['id_Soins'];
		$nom = $unSoin['nom_Soins'];
	  ?>
		<li>
			<a href=index.php?uc=gererProduit&soin=<?=$idSoin ?>&action=voirLesProduitsAdmin><?=$nom?></a>
		</li>
	<?php
	}
	?>
	</ul>
	<a href=index.php?uc=gererProduit&action=vueAjout> Ajouter un produit </a>

</div>
