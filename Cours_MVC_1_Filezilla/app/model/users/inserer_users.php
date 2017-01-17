<?php

	if(!defined("_BASE_URL")) die("Ressource interdite");
	function inserer_users($user)
	{
		global $pdo;

		try
		{
			$req = "INSERT INTO blog_users(user_login, user_pass, user_email, display_name)
					VALUES (:user_login, :user_pass, :user_email, :display_name)";

			$query = $pdo->prepare($req);

			$query->bindValue(':user_login', $user["user_login"], PDO::PARAM_STR);
			$query->bindValue(':user_pass', $user["user_pass"], PDO::PARAM_STR);
			$query->bindValue(':user_email', $user["user_email"], PDO::PARAM_STR);
			$query->bindValue(':display_name', $user["display_name"], PDO::PARAM_STR);

			$query->execute();

			//Récupération de l'ID
			return $pdo->lastInsertId();
		}

		catch(Exception $e)
		{
			return false;
		}
	}