<?php
	
	if(!defined("_BASE_URL")) die("Ressource interdite");
	function securite_session_start()
	{
		session_start();

		//On récupère l'adresse IP du client, en prévoyant le cas du proxy
		$ip = !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
		//On fabrique une chaine de caractères avec l'IP et le type de navigateur
		$securite = $ip . '_' . $_SERVER['HTTP_USER_AGENT'];
		//S'il n'y a pas de session en cours 
		if(empty($_SESSION))
		{
			//On ouvvre la session et on enregistre la chaine de sécurité
			$_SESSION['securite'] = $securite;
			return true;			
		}

		else if($_SESSION['securite'] != $securite)
		{
			//On régénère la session et on efface tout le contenu
			session_regenerate_id();
			//On recrée tout de suite la session pour supprimer l'ancienne session dans l'immédiat
			$_SESSION = array();
			return false;
		}
		//Rappel de page sans fraude
		return true;
	}