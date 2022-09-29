<?php
$action = $_REQUEST['action'];

switch($action)
{
  case 'connected' :
	{
		if($_SESSION['connect'] == 'oui')
		{
			$lesSoins = $pdo->getLesSoins();
			include("vues/v_accAdmin.php");
		}
		else
			include("vues/v_connexion.php");
		break;
	}

	case 'deco' :
	{
		session_destroy();
		include("vues/v_connexion.php");
		//header("Location:index.php?uc=accueil");
		break;
	}

	case 'connexionAdmin' :
	{
		$pseudo = $_POST["login"];
		$mdp = $_POST["mdp"];
		$verif = $pdo->connexionAdmin($pseudo,$mdp);
		if(!$verif)
		{
			$message = "Les identifiants saisie ne sont pas correcte.";
			include("vues/v_message.php");
			include("vues/v_connexion.php");
		}
		else
		{
			$lesSoins = $pdo->getLesSoins();
			include("vues/v_accAdmin.php");
			header("Location:index.php?uc=accueil");
		}
		break;
	}
  case 'voirLesProduitsAdmin' :
	{
		$lesSoins = $pdo->getLesSoins();
		include("vues/v_accAdmin.php");

  	$typeSoin = $_REQUEST['soin'];
		$lesProduits = $pdo->getLesProduitsDuSoin($typeSoin);
		include("vues/v_voirLesProduitsAdmin.php");
		break;
	}
}
?>
