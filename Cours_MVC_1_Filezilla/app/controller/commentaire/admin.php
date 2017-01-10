<?php

	protection("user", "user", "login", USER_ADMIN);

	//Appel du modèle pour obtenir la liste des utilsateurs
	$users = selecttable("blog_users", 
					array("orderby" => "display_name",
							"order" => "ASC"));

	//Traitement du paramètre de numéro de page
	if(!isset($_GET['page']))
	{
		$page = 1;
	}

	else
	{
		$page = $_GET['page'];
	}

	$offset = ($page -1) * PAGINATION_COMMENTAIRES;

	$options = array(
			"orderby" => "comment_date",
			"order" => "DESC",
			"limit" => PAGINATION_COMMENTAIRES,
			"offset" => $offset);

	if(isset($_GET["user"]))
	{
		$options["wherecolumn"] = "comment_author"; 
		$options["wherevalue"] = $_GET["user"]; 
	}
	
	//Appel du modèle pour obtenir la liste des commentaires
	$commentaires = selecttable("blog_comments", $options);	

	if(isset($_GET["user"]))
	{
		$options = array(
							"wherecolumn" => "comment_author",
							"wherevalue" => $_GET["user"]
						);
	}

	else
	{
		$options = array();
	}

	$nb_commentaires = counttable("blog_comments", $options);

	define("APP_LANG", "fr");
	define("PAGE_TITLE", "Modération des commentaires");
	include_once('app/view/commentaire/admin.php');