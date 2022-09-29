<div id="ajouter">
	<!-- action=ajouterProduit => dans le case de gestionProduit-->
  <form method="post" action="index.php?uc=gererProduit&action=ajouterUnProduit">
    <fieldset>
      <p>
    	   <label for="nom"> Nom </label>
         <input id="nom" type="text" name="nom" value="" size="5" maxlength="50" >
      </p>
      <p>
        	<label for="description"> Description</label>
        	<input id="description" type="text" name="description" value="" size="5" maxlength="50" >
      </p>
      <p>
        <label for="peau"> Type de peau du produit :</label>
        <select name="peau" id="peau">
            <option value="">--Type de peau--</option>
            <option value="Peau sèche"> Peau sèche </option>
            <option value="Peau grasse"> Peau grasse </option>
            <option value="Peau acnéique"> Peau acnéique </option>
            <option value ="Peau normale"> Peau normale </option>
            <option value="Peau mixte"> Peau mixte</option>
        </select>
      </p>
      <p>
        <label for="marque"> Marque </label>
        <select name="marque" id="marque">
          <option value="">--Marque--</option>
          <?php
          $lesMarques = $pdo->getLesMarques();
          foreach( $lesMarques as $uneMarque)
          {
            $idMarque = $uneMarque['id_Marque'];
            $nomMarque = $uneMarque['nom_Marque'];
            ?>

              <option value=" <?=$idMarque?>"> <?=$nomMarque?></option>
          <?php
          }
          ?>
          </select>
      </p>
      <p>
        <label for="prix"> Prix </label>
        <input id="prix" type="text" name="prix" value="" size="5" maxlength="15" >
      </p>
      <p>
      	<label for="image"> Image </label>
        <input type="file"
       id="image" name="image"
       accept="image/png, image/jpeg">
      </p>
      </p>
      <p>
        <label for="soin">Type de soin :</label>

      <select name="soin" id="soin">
          <option value="">--Type de soin--</option>
          <option value="DEM"> Démaquillant </option>
          <option value="NET"> Nettoyant </option>
          <option value="EXFO"> Exfoliant </option>
          <option value ="TON"> Tonifiant </option>
          <option value="TRAI"> Traitement </option>
      </select>

        <input id="valider" type="submit" name="valider" value="Ajouter">
      </p>
    </fieldset>
  </form>
</div>
