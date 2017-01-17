<?php
	define("_BASE_URL", true);

	include_once('lib/securite_session_start.php');
	if(!securite_session_start())
	{
		die("Tentative de corruption de la session !");
	}	
	include_once('app/model/pdo.inc.php');
	include_once('app/config/config.inc.php');
	include_once('core/coremodel.php');
	include_once('core/corecontroller.php');
	include_once('core/coreview.php');


	//Appel du controleur du module demandée
	if(!isset($_GET['module']))
	{
		$module = DEFAULT_MODULE;
	}

	else
	{
		$module = $_GET['module'];
	}

	//Appel du controleur de l'action demandée
	if(!isset($_GET['action']))
	{
		$action = DEFAULT_ACTION;
	}

	else
	{
		$action = $_GET['action'];
	}

	include_once('core/corecontroller.php');

	$url = "app/controller/" . $module . "/" . $action . ".php";

	if(file_exists($url))
	{
		include_once($url);
	}

	else
	{
		include_once("app/view/error.php");
	}

