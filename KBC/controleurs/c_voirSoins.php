
<!-- Controleur pour consulter et commander Vanille -->
<?php
initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirLesProduits':
	{
		$typeSoin = $_REQUEST['soin'];
		$lesProduits = $pdo->getLesProduitsDuSoin($typeSoin);
		include("vues/v_produits.php");
		break;
	}
	case 'voirLesProduitParMarque' :
	{
		$marque = $_REQUEST['marque'];
		$lesProduits = $pdo->getLesProduitsDeMarque($marque);
		include("vues/v_produitParMarque.php");
		break;
	}
	case 'voirProduitsParPeauSoin' :
	{
		$typeSoin = $_REQUEST['soin'];
		$typePeau = $_REQUEST['peau'];
		$lesProduits = $pdo->getLesProduitsParPeauSoin($typePeau, $typeSoin);
		include("vues/v_produits.php");
		break;
	}
	case 'voirProduitsParPeauMarque' :
	{
		$marque = $_REQUEST['marque'];
		$typePeau = $_REQUEST['peau'];
		$lesProduits = $pdo->getLesProduitsParPeauMarque($typePeau, $marque);
		include("vues/v_produitParMarque.php");
		break;
	}
	case 'voirUnProduit' :
	{
		$leProduit = $_REQUEST['produit'];
		$lesProduits = $pdo->getLeProduit($leProduit);
		include("vues/v_prodIndividuel.php");
		break;
	}
	case 'ajoutPanier':
	{
		$idProduit=$_REQUEST['produit'];
		$typeSoin = $_REQUEST['soin'];
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Ce produit est déjà dans le panier !!";
			include("vues/v_message.php");
		}
	  $lesProduits = $pdo->getLesProduitsDuSoin($typeSoin);
		include("vues/v_produits.php");
		break;
	}
	case 'ajoutPanierMarque':
	{
		$idProduit=$_REQUEST['produit'];
		$marque = $_REQUEST['marque'];
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Ce produit est déjà dans le panier !!";
			include("vues/v_message.php");
		}
	  $lesProduits = $pdo->getLesProduitsDeMarque($marque);
		include("vues/v_produitParMarque.php");
		break;
	}
	case 'voirTuto' :
	{
		include("vues/v_tuto.php");
	}

}
?>
