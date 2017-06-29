<?php $this->layout('layout', [
	'title' => 'Bienvenue sur le Tchat !',
]); ?>

<?php $this->start('main_content') ?>
	<!-- Affichage des messages du tchat -->
	<div id="showMessages"></div>

	<form method="POST">
		<div id="errorAjax"></div>
		<label for="message">Message :</label>
	   	<textarea name="message" id="message"></textarea><br>
	    <button type="submit" id="submit">Répondre</button>
	</form>

<?php $this->stop('main_content') ?>


<?php $this->start('js') ?>
<script>
function getMessages(){
	$.getJSON('<?=$this->url('chat_list');?>', function(htmlMessages){
		$('#showMessages').html(htmlMessages);
	});
}

$(document).ready(function(){
	
	getMessages(); // Au chargement de la page

	$('#submit').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: '<?=$this->url('chat_add');?>',
			type: 'post',
			dataType: 'json',
			data: {message: $('#message').val()},
			success: function(retour){

				if(retour.result == true){
					getMessages(); // On recupere les messages pour afficher le nouveau messages
					$('#message').val('');
					$('#errorAjax').html('');

				}
				else if(retour.result == false){
					$('#errorAjax').html(retour.message);
				}
			},
		});
	});

});
</script>
<?php $this->stop('js') ?>
