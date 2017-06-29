<?php

namespace Model;

class TchatModel extends \W\Model\Model
{
	/** 
	* Récupère les messages avec le nom des auteurs
	*/

	public function findAllWithAuthors(){
		// Selectionne dans tous les champs de la table chat et le champs firstname dans la table users depuis "cette table" as c (chat) jointe à users as u sur le champs de chat(idUser) et le champs id de users.
		$sql = 'SELECT c.*, u.firstname FROM '.$this->table.' AS c INNER JOIN users AS u ON c.idUser = u.id ORDER BY c.date_publish ASC ';

		$select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoi les résultats
		}

		return false;
	}

}