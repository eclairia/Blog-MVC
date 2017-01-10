<?php

	//Traitement des paramètres
	if(!isset($_GET['page']))
	{
		$page = 1;
	}

	else
	{
		$page = $_GET['page'];
	}

	$offset = ($page -1) * PAGINATION_ARTICLES;

	//Appel du modèle pour obtenir le nombre d'articles
	//include_once('app/model/article/lire_nb_articles.php');
	//$nb_articles = lire_nb_articles();

	$nb_articles = counttable("blog_posts");


	//$nb_pages = ceil($nb_articles/PAGINATION_ARTICLES);

	//Appel lire_articles.php pour obtenir les 2 derniers articles
	include_once('app/model/article/lire_articles.php');

	$articles = lire_articles($offset, PAGINATION_ARTICLES);

	//Traitement sur les données renvoyées par le modèle
	foreach($articles as $cle => $article)
	{
		//echo 'Article ' . $cle . " =";
		//var_dump($article);

		$articles[$cle]['user_login'] = "Publié le: " . $article['post_date'];
		$articles[$cle]['post_title'] = htmlspecialchars($article['post_title']);
	}

	//Appel de la vue correspondante
	define("APP_LANG", "fr");
	define("PAGE_TITLE", 'Liste des articles du blog');
	include_once('app/view/article/index.php');