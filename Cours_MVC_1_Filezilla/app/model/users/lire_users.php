<?php

	if(!defined("_BASE_URL")) die("Ressource interdite");
	function lire_users()
	{
		global $pdo;

		try
		{
			$query = $pdo->prepare('SELECT *
									FROM blog_users
									ORDER BY ID DESC');

			$query->execute();

			$users = $query->fetchAll();

			$query->closeCursor();

			return $users;			
		}

		catch(Exception $e)
		{
			die('Erreur SQL: ' . $e->getMessage());
		}		
	}