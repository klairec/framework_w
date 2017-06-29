<?php $this->layout('layout', [
	'title' => 'Accueil',
	'description' => 'Ma description homepage',
]); ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<?php $this->stop('css') ?>
