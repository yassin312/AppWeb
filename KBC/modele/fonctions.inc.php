<?php
/**
 * Initialise le panier de commande
 * Crée une variable de type session dans le cas
 * où elle n'existe pas
*/
function initPanier()
{
	if(!isset($_SESSION['panier']))
	{
		$_SESSION['panier']= array();
	}
}

/**
 * Ajoute un produit au panier
 *
 * Teste si l'identifiant du produit est déjà dans la variable session
 * ajoute l'identifiant à la variable de type session dans le cas où
 * où l'identifiant du produit n'a pas été trouvé
 * @param $idProduit : identifiant de produit
 * @return vrai si le produit n'était pas dans la variable, faux sinon
*/
function ajouterAuPanier($idProduit)
{
	$ok = true;
	if(in_array($idProduit,$_SESSION['panier']))
	{
		$ok = false;
	}
	else
	{
		$_SESSION['panier'][]= $idProduit;
	}
	return $ok;
}
function supprimerPanier()
{
unset($_SESSION['panier']);
}

// function SupprimerProduits($produits_a_supprimer)
// {
//     //On crée un panier temporaire, dans lequel on "recopiera" le vrai panier sans les produits à supprimer. Ainsi, on évite d'avoir des entrées avec des valeurs égales à NULL, ce qui ferait bordélique. On crée un nouveau panier tout beau, tout propre.
//     $panier_temporaire = array();
//     //On parcoure le panier
//     foreach($_SESSION['panier'] as $id_produit)
//     {
//         $ok = false;
//         for($i=0; $i<count($produits_a_supprimer) && !$ok; $i++)
//             if($id_produit == $produits_a_supprimer[$i])
//                    $ok = true;
//         if(!$ok) //Si apres parcours de tous les éléments du tableau on ne veut pas supprimer l'élément :
//         {
//             array_push ($panier_temporaire, $_SESSION['panier']);
//         }
//     }
//
//     $_SESSION['panier'] = $panier_temporaire; //On recopie le panier temporaire dans le vrai panier.
//
//     unset($panier_temporaire); //On supprime le panier temporaire.
// }

function supprimerProduit()
{
	/* recherche de l'index dans le tableau panier */
	$index= array_search($idProduit,$_SESSION['panier']);
	//echo $index;

 	// on supprime le produit dans le tableau panier avec la valeur index trouvée
 	unset($_SESSION['panier'][$index]);
}

/**
 * Supprimer un article du panier
 *
 * @param String    $ref_article numéro de référence de l'article à supprimer
 * @return Boolean  Retourn TRUE si la suppression a bien été effectuée, FALSE sinon
 */
// function supprim_article($ref_article)
// {
//     $suppression = false;
//     /* création d'un tableau temporaire de stockage des articles */
//     $panier_tmp = array("id_article"=>array(), "prix"=>array());
//     /* Comptage des articles du panier */
//     $nb_articles = count($_SESSION['panier']['id_article']);
//     /* Transfert du panier dans le panier temporaire */
//     for($i = 0; $i < $nb_articles; $i++)
//     {
//         /* On transfère tout sauf l'article à supprimer */
//         if($_SESSION['panier']['id_article'][$i] != $ref_article)
//         {
//             array_push($panier_tmp['id_article'],$_SESSION['panier']['id_article'][$i]);
//             array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]);
//         }
//     }
//     /* Le transfert est terminé, on ré-initialise le panier */
//     $_SESSION['panier'] = $panier_tmp;
//     /* Option : on peut maintenant supprimer notre panier temporaire: */
//     unset($panier_tmp);
//     $suppression = true;
//     return $suppression;
// }

function getLesIdProduitsDuPanier()
{
	return $_SESSION['panier'];
}
/**
 * Retourne le nombre de produit du panier
 *
 * Teste si la variable de session existe
 * et retourne le nombre d'éléments de la variable session
 * @return : le nombre
*/
function nbProduitsDuPanier()
{
	$n = 0;
	if(isset($_SESSION['panier']))
	{
	$n = count($_SESSION['panier']);
	}
	return $n;
}
?>
