<div class="produit">

<?php
foreach( $lesProduits as $unProduit)
{
  $id = $unProduit['id_Prod'];
  $soin = $unProduit['type_Soins'];
  $nom = $unProduit['nom_Prod'];
  $description = $unProduit['description'];
  $prix=$unProduit['prix'];
  $image = $unProduit['image_Prod'];
  $peau = $unProduit['type_peau'];
  $marque = $unProduit['marque'];

  $nom = mb_strtoupper($nom, 'UTF-8');
  ?>

      <div class="container-fluid prods">
        <div class="row">
          <div class="col-6">
            <div class="marque">  <a class="marque" href=index.php?uc=voirSoins&marque=<?=$marque?>&action=voirLesProduitParMarque>PAR  <?=$marque?>	</a></div>
            <?=$prix." €"?>

            <div class="imageProd">
                <img src="<?=$image ?>" alt=image height="auto" width="300px" />
            </div>
          </div>
          <div class="col-6">
            <div class="col">
              <a href=index.php?uc=voirSoins&soin=<?=$typeSoin?>&produit=<?=$id ?>&action=ajoutPanier>
               <input class="bouton"
                type="button"
                value="Ajouter au panier">
                <br>
            </div>
            </a>
            <?=$nom?>
            <div class="w-100"></div>
            <?=$description?>
            <?=$peau?>
            <?=$soin?>

          </div>

       </div>


<?php
}
?>
</div>
