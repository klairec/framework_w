<?php

namespace Controller;

use \Model\BlogModel;
use \Respect\Validation\Validator as v;

class BlogController extends \W\Controller\Controller 
{
	

	public function add()
	{
		$me = $this->getUser(); // utilisateur connecté

		// Limite l'accès à la page à un utilisateur non connecté
		if(empty($me)){
			$this->showNotFound(); // affichera une page 404
		}

		$post = [];
		$errors = []; 
		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(!v::notEmpty()->length(10, null)->validate($post['title'])){
				$errors[] = 'Le titre doit comporter au moins 10 caractères';
			}

			if(!v::notEmpty()->length(50, null)->validate($post['content'])){
				$errors[] = 'Le contenu doit comporter au moins 50 caractères';
			}

			if(count($errors) === 0){
				$data = [
					'title' 	=> ucfirst($post['title']),
					'content'	=> $post['content'],
					'date_add'  => date('Y-m-d H:i:s'),
					'id_user'	=> $me['id'], // récupère l'id stocké en session
				];

				$blogModel = new BlogModel();
				$insert = $blogModel->insert($data);
				if(!empty($insert)){
					// Ajoute un message "flash" (stocké en session temporairement)
					// Note : il faut toutefois ajouter l'affichage de ce message au layout
					$this->flash('Votre article a été ajouté', 'success');

					$this->redirectToRoute('blog_list'); // Redirige vers la route donnée
				}
			}
			else {
				$errorsText = implode('<br>', $errors);
				$this->flash($errorsText, 'danger');

			}

		}

		$this->show('blog/add', [
			'post'	=> $post,
		]);

	}

	/**
	 * Liste des articles
	 */
	public function listAll()
	{
		$blogModel = new BlogModel();
		$articles = $blogModel->findAll();

		$params = ['articles' => $articles];
		$this->show('blog/list', $params);
	}
}