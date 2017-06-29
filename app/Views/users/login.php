<?=$this->layout('layout', ['title' => 'Connexion']); ?>


<?php $this->start('main_content'); ?>

<form method="post">

	<label for="ident">Votre email</label>
	<input type="email" name="ident" id="ident" required>

	<br>
	<label for="passwd">Votre mot de passe</label>
	<input type="password" name="passwd" id="passwd" required>

	<br>
	<input type="submit" value="Se connecter">

</form>

<?php $this->stop('main_content'); ?>