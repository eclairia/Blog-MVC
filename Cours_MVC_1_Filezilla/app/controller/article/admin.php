<?php

	if(!defined("_BASE_URL")) die("Ressource interdite");
	
	protection("user", "users", "login", USER_LAMBDA);
	echo "Accueil backoffice";