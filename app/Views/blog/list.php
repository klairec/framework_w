<?=$this->layout('layout', ['title' => 'Liste des articles sur le blog']); ?>


<?=$this->start('main_content'); ?>
<?php if(!empty($articles)):?>

	<?php foreach ($articles as $article): ?>

		<article>
			<h3><?=$article['title']; ?></h3>
			<div class="content">
				<?=nl2br($article['content']); ?>
			</div>
		</article>
		<hr>

	<?php endforeach; ?>
<?php else: ?>
	<div class="alert alert-danger">
		Aucun article !
	</div>
<?php endif; ?>


<?=$this->stop('main_content'); ?>