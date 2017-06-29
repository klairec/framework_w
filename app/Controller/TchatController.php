<?php

namespace Controller;

use \W\Controller\Controller;
use Model\TchatModel;
use \W\Security\AuthentificationModel;

class TchatController extends Controller
{	
	/*
	* Affichage du chat et du formulaire permettant d'envoyer un message
	*/

	public function tchatRead()
	{
		if(!empty($this->getUser())){ // affichage seulement si l'utilisateur est connecté
			$this->show('tchat/tchat');
		}
		else {
			$this->showNotFound(); // sinon une page 404
		}
	}

	/*
	* Valider un message et l'insérer en base
	*/
	public function tchatAjaxAdd()
	{
		
		$post = [];
		$errors = [];
		$current_user = $this->getUser();

		if(!empty($_POST)){

			$post = array_map('trim', array_map('strip_tags', $_POST));
			
			if(empty($current_user)){
				$errors[] = 'Vous devez être connecté pour publier un message.';
			}

			if(strlen($post['message']) < 2){
				$errors[] = 'Le message doit comporter au moins 2 caractères';
			}

			if(count($errors) === 0){

				$current_user = $this->getUser();
				$data = [
					'message' => $post['message'],
					'idUser'  => $current_user['id'],
					'date_publish' => date('c'),
				];

				$tchatModel = new TchatModel;
				$insert = $tchatModel->insert($data);

				if($insert){
					$json = [
						'result' => true,
					];
				}
				else {
					$json = [
						'result' => false,
						'message' => 'Une erreur est survenue lors de l\'ajout de votre message',
					];
				}
			} // count($errors)
			else {
				$json = [
					'result' => false,
					'message' => implode('<br>', $errors),
				];
			}


			$this->showJson($json);
		}

	}

	/*
	* Récupération de tous les messages existants en base
	*/
	public function tchatAjaxList()
	{

		$tchatModel = new TchatModel();
		$messages = $tchatModel->findAllWithAuthors();

		$html = '<ul>';
		foreach($messages as $msg){
			$html.= '<li><strong>'.$msg['firstname'].'</strong> ('.$msg['date_publish'].') : '.$msg['message'].'</li>';
		}
		$html.= '</ul>';


		$this->showJson($html); // $html => htmlMessages dans le JS


	}
}
?>