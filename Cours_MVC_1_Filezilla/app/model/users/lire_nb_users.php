<?php

	function lire_nb_users()
	{
		global $pdo;

		try
		{
			$query = $pdo->prepare('SELECT COUNT(*)
									FROM blog_users');

			$query->execute();

			$nb_users = $query->fetch();

			return $nb_users;

			$query->closeCursor();
		}

		catch(Exception $e)
		{
			die('Erreur SQL: ' . $e->getMessage());
		}		
	}