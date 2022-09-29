<?php
/**
 * Classe d'accès aux données.
 * Utilise les services de la classe PDO
 * pour l'application
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monpdoKBC qui contiendra l'unique instance de la classe
 */

class pdoKBC
{
    private static $monPdo;
		private static $monpdoKBC = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 **/
	private function __construct()
	{
    pdoKBC::$monPdo = new PDO('mysql:host=localhost;dbname=kbc', 'root', '');
		pdoKBC::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		pdoKBC::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancepdoKBC = pdoKBC::getpdoKBC();
 * @return l'unique objet de la classe pdoKBC
 */
	public  static function getpdoKBC()
	{
		if(pdoKBC::$monpdoKBC == null)
		{
			pdoKBC::$monpdoKBC= new pdoKBC();
		}
		return pdoKBC::$monpdoKBC;
	}
/**
 * Retourne tout les soins sous forme d'un tableau associatif
 *
 * @return le tableau associatif des soins
*/
	public function getLesSoins()
	{
		$req = "SELECT * FROM soins";
		$res = pdoKBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

  /**
  *Retourne tout les types de peau sous forme d'un tableau
  */

  public function getLesTypeDePeau()
  {
    $req="SELECT * FROM peau";
    $res = pdoKBC::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  /**
  *Retournes toutes les marques sous forme d'un tableau
  */

  public function getLesMarques()
  {
    $req = "SELECT * FROM marque";
    $res = pdoKBC::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 *
 * @param $idSoin
 * @return un tableau associatif
*/
  public function getLeTypeDeSoin($nomSoin)
  {
    $req="SELECT nom_Soins FROM soin WHERE id_Soins = '$idSoin'";
    $res = pdoKBC::$monPdo->query($req);
    $leNom = $res->fetch();
    return $leNom;
  }



	public function getLesProduitsDuSoin($idSoin)
	{
	  $req="SELECT * FROM produit WHERE type_Soins = '$idSoin'";
		$res = pdoKBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

  public function getLeProduit($idProd)
  {
    $req="SELECT * FROM produit WHERE id_Prod = '$idProd'";
		$res = pdoKBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }

  public function getLesProduitsParPeauSoin($typePeau, $typeSoin)
  {
    $req="SELECT * FROM produit WHERE type_peau = '$typePeau' AND type_Soins = '$typeSoin'";
    $res = pdoKBC::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  /**
  */
  public function getLesProduitsParPeauMarque($typePeau, $marque)
  {
    $req="SELECT * FROM produit WHERE type_peau = '$typePeau' AND marque = '$marque'";
    $res = pdoKBC::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function getLesProduitsDeMarque($idMarque)
  {
    $req="SELECT * FROM produit WHERE marque = '$idMarque'";
    $res = pdoKBC::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }
/**
 * Retourne les produits concernés par le tableau des idProduits passés en argument
 *
 * @param $lesIdProduits tableau d'idProduits
 * @return un tableau associatif
*/
  public function getLesProduitsDuTableau($lesIdProduits)
	{
		$nbProduits = count($lesIdProduits);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($lesIdProduits as $unIdProduit)
			{
				$req = "SELECT * FROM produit WHERE id_Prod = '$unIdProduit'";
				$res = pdoKBC::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
	}


	public function connexionAdmin($log,$mdp)
  {
    $req = "SELECT login, password FROM utilisateur WHERE login = '$log'";
    $res = pdoKBC::$monPdo->query($req);
    $lesLignes = $res->fetch();
     $ok = false;
     $mdpbdd = $lesLignes['password'];
     $loginbdd = $lesLignes['login'];
     if (($mdp == $mdpbdd) && ($log == $loginbdd))
     {
      $_SESSION['connect'] = 'oui';
      $ok = true;
     }
    return $ok;
  }
  public function modifierProduit($id, $nom, $description, $peau, $marque, $soin, $prix)
  {
    $req = "UPDATE produit SET ";
    if($nom != null)
    {
      $req = $req."nom_Prod = "."'".$nom."',";
    }
    if($description != null)
    {
      $req = $req."description = "."'".$description."',";
    }
    if($type_peau != null)
    {
      $req = $req."type_peau = "."'".$peau."',";
    }
    if($marque != null)
    {
     $req = $req."marque = "."'".$marque."',";
    }
    if($soin != null)
    {
      $req = $req."type_Soins = "."'".$soin."',";
    }
    if($prix != null)
    {
      $req = $req."prix = "."'".$prix."',";
    }
    if($id != null)
    {
      $req = $req." id_Prod = "."'".$id."' ";
    }
    $req = $req." WHERE id_Prod = "."'".$id."' ";
    $res = pdoKBC::$monPdo->query($req);
  }

  public function supprimerProduit($id)
  {
  	$req = "DELETE FROM produit WHERE id_Prod = '$id' ";
    $res = pdoKBC::$monPdo->exec($req);
	}


	public function ajoutProduit($id, $nom, $description, $peau, $marque,$prix, $image, $soin)
	{
		$req = "INSERT INTO produit VALUES ('$id', '$nom','$description', '$peau', '$marque', '$prix', 'images/$image', '$soin')";
		$res = pdoKBC::$monPdo->query($req);
		echo $req;
	}

  public function creerCommande($nom,$prenom,$rue,$cp,$ville,$mail )
  {
    $req = "select max(id_Commande) as maxi from commande";
    $res = pdoKBC::$monPdo->query($req);
    $laLigne = $res->fetch();
    $maxi = $laLigne['maxi'] ;
    $maxi++;
    $idCommande = $maxi;

    $date = date('Y/m/d');
    $req = "insert into commande values ('$idCommande','$date','$nom', '$prenom','$rue','$cp','$ville','$mail')";
    $res = pdoKBC::$monPdo->exec($req);

    $lesProd = getLesIdProduitsDuPanier();
    for($i = 0; $i < nbProduitsDuPanier(); $i++)
    {
      $req2 = "insert into contenir values ('$idCommande','$lesProd[$i]')";
      $res2 = pdoKBC::$monPdo->exec($req2);
    }
  }
}

?>
