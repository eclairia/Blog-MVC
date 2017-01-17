<?php

	if(!defined("_BASE_URL")) die("Ressource interdite");
	$retour = deletetable("blog_comments",
						array(
								"idcolumn" => "comment_ID",
								"idvalue" => $_GET["id"]
							));

	if($retour)
	{
		location("commentaire", "admin", "page=" . $_GET['page'] . "&notif=ok");
	}

	else
	{
		location("commentaire", "admin", "page=" .  $_GET['page'] . "&notif=nok");
	}