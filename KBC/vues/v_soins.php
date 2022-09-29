<div class="soin">
	<ul id="categ">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" Title="Tous nos soins">
				Soins
			</a>
			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

				< <li><a class="dropdown-item" href=index.php?uc=voirSoins&soin=<?=$idSoin ?>&action=voirLesProduits><?=$nom ?></a></li>
				<li><a class="dropdown-item" href="#">Another action</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="#">Something else here</a></li>
			</ul>
		</li>
	<?php

	foreach( $lesSoins as $unSoin)
	{
		$idSoin = $unSoin['id_Soins'];
		$nom = $unSoin['nom_Soins'];
	  ?>
		<li>
			<a href=index.php?uc=voirSoins&soin=<?=$idSoin ?>&action=voirLesProduits><?=$nom ?></a>
		</li>
	<?php
	}
	?>
	</ul>
</div>
