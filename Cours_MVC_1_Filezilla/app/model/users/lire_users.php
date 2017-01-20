<?php

	if(!defined("_BASE_URL")) die("Ressource interdite");
	function lire_users($offset, $limite)
	{
		global $pdo;

		try
		{
			//On envoie la requête
			$query = $pdo->prepare('SELECT ID, user_login, user_email, display_name
											FROM blog_users
											ORDER BY ID DESC
											LIMIT :offset,:limite');

			//On initialise les paramètres
			$query->bindParam(':offset', $offset, PDO::PARAM_INT);
			$query->bindParam(':limite', $limite, PDO::PARAM_INT);

			//On exécute la requête
			$query->execute();

			//On récupère tous les résultats
			$users = $query->fetchAll();

			//On supprime le curseur
			$query->closeCursor();

			//On retourne tous les articles selectionnés
			return $users;
		}

		catch(Exception $e)
		{
			erreur($e);
		}
	}