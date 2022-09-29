<div id="modifier">
  <form method="post" action="index.php?uc=gererProduit&action=modifierLeProduit">
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

      </p>
      <p>
        <label for="soin">Type de soin :</label>
        <select name="soin" id="soin">
          <option value="">--Type du soin--</option>
          <?php
          $lesMarques = $pdo->getLesSoins();
          foreach( $lesSoins as $unSoin)
          {
            $idSoin = $unSoin['id_Soins'];
            $nomSoin = $unSoin['nom_Soins'];
            ?>

              <option value=" <?=$idSoin?>"> <?=$nomSoin?></option>
          <?php
          }
          ?>
          </select>
    </p>
    <p>
    	<input id="id" type="text" name="id" value="<?php echo $_REQUEST["produit"];?>" hidden>
      <input id="valider" type="submit" name="valider" value="Modifier">
    </p>

    </fieldset>

  </form>
</div>
