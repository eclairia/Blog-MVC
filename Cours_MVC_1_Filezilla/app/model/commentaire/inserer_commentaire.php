<?php

	function inserer_commentaire($commentaire, $user_id)
	{
		global $pdo;

		try
		{
			$req = "INSERT INTO blog_comments(comment_post_ID, comment_author, comment_content)
					VALUES (:comment_post_ID, :comment_author, :comment_content)";
			$query = $pdo->prepare($req);

			$query->bindValue(':comment_post_ID', $commentaire["id"], PDO::PARAM_INT);
			$query->bindValue(':comment_author', $user_id, PDO::PARAM_INT);
			$query->bindValue(':comment_content', $commentaire["contenu_commentaire"], PDO::PARAM_STR);

			$query->execute();
			
			return true;
		}

		catch(Exception $e)
		{
			return false;
		}
	}