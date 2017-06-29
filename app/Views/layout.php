<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="description" content="<?=$this->e($description);?>">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>"-->
	<?=$this->section('css'); ?>
</head>
<body>
	<main>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
			<?php if(isset($description) && !empty($description)): ?>
			<h3>W :: <?= $this->e($description) ?></h3>
			<?php endif; ?>

			<ul class="list-unstyled">

				<li>
					<a href="<?=$this->url('blog_list');?>">Liste des articles</a>
				</li>
				<?php if(!empty($w_user)): ?>
					<li>
						<a href="<?=$this->url('blog_add');?>">Ajouter un article</a>
					</li>
					<li>
						<a href="<?=$this->url('chat_view');?>">Allez sur le chat</a>
					</li>
					<li>
						<a href="<?=$this->url('users_logout');?>">Déconnexion</a>
					</li>
				<?php else: ?>
					<li>
						<a href="<?=$this->url('users_login');?>">Connexion</a>
					</li>

					<li>
						<a href="<?=$this->url('users_add');?>">S'inscrire</a>
					</li>
				<?php endif; ?>
			</ul>


			<p class="pull-right">Bonjour <?=$w_user['firstname']; ?></p>
		</header>

		<section>
			<?php if(!empty($w_flash_message->message)): ?>
				<div class="alert alert-<?=$w_flash_message->level;?>">
					<?=$w_flash_message->message;?>
				</div>
			<?php endif; ?>

			<?= $this->section('main_content') ?>
		</section>

		<footer>
			<?=$this->section('footer'); ?>
		</footer>
	</div>
	</main>
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<?=$this->section('js');?>
</body>
</html>