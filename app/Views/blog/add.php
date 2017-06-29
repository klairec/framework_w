<?=$this->layout('layout', ['title' => 'Ajouter un article sur le blog']); ?>


<?=$this->start('main_content'); ?>

	<?php 

		// Opérateur ternaire : (condition) ? 'si vrai' : 'si faux';
		$articleTitle = isset($post['title']) ? $post['title'] : '';
		$articleContent = isset($post['content']) ? $post['content'] : '';
	?>
	<form method="post">


		<label for="title">Titre de l'article</label>
		<input type="text" name="title" id="title" value="<?=$articleTitle;?>" required>

		<br>
		<label for="content">Contenu</label>
		<textarea name="content" id="content"><?=$articleContent;?></textarea>

		<br>
		<button type="submit" class="btn btn-primary">Enregistrer mon article</button>

	</form>

<?=$this->stop('main_content'); ?>


