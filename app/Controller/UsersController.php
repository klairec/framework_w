<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

class UsersController extends Controller
{

	public function add()
	{

		$post = [];
		$errors = [];
		$formValid = false;
		$rolesAvailable = ['admin', 'editor', 'user'];

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(strlen($post['firstname']) < 2){
				$errors[] = 'Votre prénom doit comporter au moins 2 caractères';
			}			

			if(strlen($post['lastname']) < 2){
				$errors[] = 'Votre nom de famille doit comporter au moins 2 caractères';
			}

			if(strlen($post['username']) < 2){
				$errors[] = 'Votre pseudo doit comporter au moins 2 caractères';
			}

			if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
				$errors[] = 'Votre adresse email est invalide';
			}
			
			if(strlen($post['password']) < 8){
				$errors[] = 'Votre mot de passe doit comporter au moins 8 caractères';
			}


			if(!in_array($post['role'], $rolesAvailable)){
				$errors[] = 'Votre rôle est invalide';
			}

			if(count($errors) === 0){
				$authModel = new AuthentificationModel();

				$data = [
					'firstname' => $post['firstname'],
					'lastname' 	=> $post['lastname'],
					'username' 	=> $post['username'],
					'email' 	=> $post['email'],
					'password' 	=> $authModel->hashPassword($post['password']),
					'role'		=> $post['role'],
				];

				// UsersModel est importer via le "use" en haut de la class actuelle
				$usersModel = new UsersModel();
				$insert = $usersModel->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

				if(!empty($insert)){
					$formValid = true;
				}


			}
		}

		$params = [
			// Dans la vue, les clés deviennent des variables
			'formValid' 	=> $formValid, 
			'formErrors'	=> $errors,
		];
		// Si on oubli pas de transmettre tout ça dans la méthode show()
		$this->show('users/add', $params);
	}


	public function login()
	{
		$post = [];
		$errors = [];

		if(!empty($_POST)){

			$post = array_map('trim', array_map('strip_tags', $_POST));

			$authModel = new AuthentificationModel();
			$id_user = $authModel->isValidLoginInfo($post['ident'], $post['passwd']);

			if($id_user > 0){ // Ici, on à un id de l'utilisateur
				$usersModel = new UsersModel();

				// $me = $usersModel->getUserByUsernameOrEmail($post['ident']);
				$me = $usersModel->find($id_user); 

				// $me contient désormais toutes les infos de l'utilisateur qui veut se connecter

				$authModel->logUserIn($me); // Remplit la session $_SESSION['user']

				if(!empty($authModel->getLoggedUser())){
					// Ici la session est complétée avec les infos du membre (hors mdp)
					$this->flash('Vous êtes desormais connecté', 'success');
					$this->redirectToRoute('default_home');
				}
			}

			else {
				$this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
			}

		}

		$this->show('users/login');
	}


	public function logout()
	{
		// On peut éventuellement faire un formulaire de confirmation

		$authModel = new AuthentificationModel();
		$authModel->logUserOut();

		if(empty($authModel->getLoggedUser())){
			// Si l'utilisateur est "vide", on a donc bien vider la session, il est donc déconnecté
			$this->flash('Aurevoir, vous êtes désormais déconnecté', 'success');
			$this->redirectToRoute('default_home');
		}


	}
}