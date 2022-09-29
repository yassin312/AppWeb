<!-- Gestion du Panier du site -->

<?php
$action = $_REQUEST['action'];

?>
<?php
switch($action)
{
	case 'voirPanier':
	{
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			echo $n.' article(s) dans votre panier.' ;
			$lesIdProduits = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesproduitsDuTableau($lesIdProduits);
			$message = "Voici votre panier" ;
			include("vues/v_panier.php");
		}
		else
		{
			$message = "Votre panier est  vide ";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'annulerPanier' :
	{
		supprimerPanier();
		$message = "Le panier a été vidé";
		include ("vues/v_message.php");
		break;
	}
	case 'supprimerProduit' :
	{
		$idProduit = $_REQUEST['produit'];
		$suppresion = SupprimerProduit($idProduit);
		$message = "Le produit a été supprimé";
		include("vues/v_message.php");
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			echo $n.' article(s) dans votre panier.' ;
			$lesIdProduits = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesproduitsDuTableau($lesIdProduits);
			include("vues/v_panier.php");
		}
		break;
	}
	case 'afficherCommande' :
	{
		include("vues/v_commande.php");
		break;
	}
	case 'validerCommande' :
	{
		if ((estUnCp($_POST['cp'])) && (estEntier($_POST['cp'])))
		{
			$pdo->creerCommande($_POST['nom'], $_POST['prenom'],$_POST['rue'],$_POST['cp'],$_POST['ville'],$_POST['mail']);
			supprimerPanier();
			$message = "Commande enregistrée";
			include("vues/v_message.php");
			break;
		}
		else
		{
			$message = "Erreur sur le code postal";
			include("vues/v_message.php");
		}
		break;
	}
}
?>
