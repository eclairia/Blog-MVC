<?php include_once("app/view/layout/header.inc.php"); ?>

	<form method="POST" action="?module=users&action=login" id="form_login">

		<label>Login: </label> <input type="text" name="user_login"><br /><br />
		<label>Mot de passe: </label> <input type="password" name="user_password"><br /><br />
		<input type="submit">

	</form>

<?php include_once("app/view/layout/footer.inc.php"); ?>