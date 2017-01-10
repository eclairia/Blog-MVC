<?php

	//Controller pour l'action detail

	if(isset($_GET['id']))
	{
		//Appel du modèle pour obtenir un article
		include_once('app/model/article/lire_article.php');
		$articles = lire_article($_GET['id']);
		$article = $articles[0];
		//var_dump($articles);

		//Appel du modèle pour obtenir le nombre d'articles
		include_once('app/model/commentaire/lire_nb_commentaires.php');
		$nb_commentaires = lire_nb_commentaires($_GET['id']);
		$nb_commentaires_par_page = ceil($nb_commentaires/10);
		//var_dump($nb_commentaires_par_page);

		//Appel du modèle pour obtenir les commentaires d'un article
		include_once('app/model/commentaire/lire_commentaires.php');
		$commentaires = lire_commentaires($_GET['id'], $nb_commentaires_par_page);

		foreach($commentaires as $cle => $commentaire)
		{
			$commentaires[$cle]['user_login'] = htmlspecialchars($commentaire['user_login']);
			$commentaires[$cle]['comment_date'] = htmlspecialchars($commentaire['comment_date']);
			$commentaires[$cle]['comment_content'] = htmlspecialchars($commentaire['comment_content']);
		}
		//var_dump($commentaires);	
		
		//Appel de la vue correspondante	
		define("APP_LANG", "fr");
		define("PAGE_TITLE", "Détail d'un article");
		include_once('app/view/article/detail.php');
	}

	else
	{
		include_once("app/view/error.php");
	}