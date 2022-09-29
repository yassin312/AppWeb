<?php
$action = $_REQUEST['action'];

switch ($action)
{
	case 'voirLesProduitsAdmin' :
	{
		$lesSoins = $pdo->getLesSoins();
		include("vues/v_accAdmin.php");

  	$typeSoin = $_REQUEST['soin'];
		$lesProduits = $pdo->getLesProduitsDuSoin($typeSoin);
		include("vues/v_voirLesProduitsAdmin.php");
		break;
	}

	case 'vueModif' :
		{
			include("vues/v_modifProd.php");
			$id = $_REQUEST["produit"];
			break;
		}
		// Peut pas changer le type de soins
		case 'modifierLeProduit' :
		{
			$modif = $pdo->modifierProduit($_POST["id"], $_POST["nom"], $_POST["description"], $_POST["peau"], $_POST["marque"], $_POST["soin"],$_POST["prix"]);
			$message = "Le produit a été modifié";
			include("vues/v_message.php");
			break;
		}
		case 'supprimerunProduit' :
		{
			$delete = $pdo->supprimerProduit($_REQUEST["produit"]);
			$message = "Produit supprimé.";
			include("vues/v_message.php");
			break;
		}
		case 'vueAjout' :
		{
			include("vues/v_ajoutProd.php");
			break;
		}
		case 'ajouterUnProduit' :
		{
			$ajout = $pdo->ajoutProduit($_POST["id"], $_POST["nom"], $_POST["description"], $_POST["peau"], $_POST["marque"],$_POST["prix"], $_POST["image"],$_POST["soin"]);
			$message = "Produit ajouté.";
			include("vues/v_message.php");
			include("vues/v_accAdmin.php");
			break;
		}
	}
?>
