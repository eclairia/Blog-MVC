<?php
	
	protection("user", "users", "login", USER_LAMBDA);


	if(!isset($_POST['post_title']))
	{
		//Appel du modèle pour obtenir la liste des catégories
		$categories = selecttable("blog_categories", 
						array("orderby" => "cat_descr",
								"order" => "DESC"));

		define("APP_LANG", "fr");
		define("PAGE_TITLE", "Détail d'un article");
		include_once("app/view/article/new.php");
	}

	else
	{
		//Appel du modele pour insérer un article
		include_once("app/model/article/inserer_article.php");
		$retour = inserer_article($_POST, $_SESSION["user"]["ID"]);

		if(!$retour)
		{
			//header("Location:?module=article&action=new&notif=nok");
			location("article", "new", "notif=nok");
		}

		else
		{
			//header("Location:?module=article&action=detail&id=". $retour . "&notif=ok");
			location("article", "detail", "id=" . $retour . "&notif=ok");
		}
	}
