<meta charset="utf-8" />
<?php
//Controleur Principal du site
session_start();
require_once("modele/fonctions.inc.php");
require_once("modele/class.pdoKBC.inc.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];
/* Instance d'accés à la base de données */
$pdo = pdoKBC::getpdoKBC();
include("vues/v_bandeau.php");

switch($uc)
{
	case 'accueil':
	{
		include("vues/v_accueil.php");
		break;
	}
  case 'login' :
  {
    include("controleurs/c_connexion.php");
    break;
  }
  case 'voirSoins' :
	{
		include("controleurs/c_voirSoins.php");
		break;
	}
	case 'gererPanier' :
	{
		include("controleurs/c_gestionPanier.php");
		break;
	}
  case 'gererProduit' :
  {
    include("controleurs/c_gestionProduit.php");
    break;
  }
}
include("vues/v_pied.php") ;
?>
