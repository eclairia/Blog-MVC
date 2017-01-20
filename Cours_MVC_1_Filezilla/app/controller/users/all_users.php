<?php

	if(!defined("_BASE_URL")) die("Ressource interdite");
	//Appel du modèle pour obtenir le nombre d'utilisateurs
	//include_once('app/model/users/lire_nb_users.php');
	//$nb_users = lire_nb_users();
	//var_dump($nb_users);

	if(!isset($_GET['page']))
	{
		$page = 1;
	}

	else
	{
		$page = $_GET['page'];
	}

	$offset = ($page -1) * PAGINATION_USERS;	

	$nb_users = counttable("blog_users");

	//Appel du modèle pour obtenir la liste des utilisateurs
	$users = selecttable("blog_users", 
						array("orderby" => "ID",
								"order" => "DESC"));
	//var_dump($users);

	include_once('app/model/users/lire_users.php');

	$users = lire_users($offset, PAGINATION_USERS);	

	//Appel de la vue correspondante
	define("APP_LANG", "fr");
	define("PAGE_TITLE", 'Liste des utilisateurs du blog');
	include_once('app/view/users/all_users.php');