<div id="creationCommande">
<form method="POST" action="index.php?uc=gererPanier&action=validerCommande">

   <fieldset>
     <legend>Commande</legend>
		<p>
			<label for="nom">Nom*</label>
			<input id="nom" type="text" name="nom" value="" size="30" maxlength="45" required>
		</p>

    <p>
      <label for="nom">Prénom*</label>
      <input id="nom" type="text" name="nom" value="" size="30" maxlength="45" required>
    </p>
		<p>
			<label for="rue">Rue*</label>
			 <input id="rue" type="text" name="rue" value="" size="30" maxlength="60" required>
		</p>
		<p>
         <label for="cp">Code postal* </label>
         <input id="cp" type="text" name="cp" value="" size="5" maxlength="5" required >
      </p>
      <p>
         <label for="ville">Ville* </label>
         <input id="ville" type="text" name="ville" value="" size="30" maxlength="45" required >
      </p>
      <p>
         <label for="mail">Email* </label>
         <input id="mail" type="text" name="mail" value="" size="30" maxlength="45" required >
      </p>

	  	<p>
         <input type="submit" value="Valider" name="valider">

      </p>
</form>
</div>
