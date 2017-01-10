<?php include("app/view/layout/header.inc.php"); ?>

	<div class="container-fluid form_insert_user">
		
		<h1>Insérer un utilisateur dans la base de données</h1>

		<form method="POST" action="?module=users&action=insert_users" id="form_users">
		    <table>
		        <tr>
		          <td><label for="user_login" class="label-insert-users">Login: </label></td>
		          <td><input name="user_login" type="text" id="user_login" class="input-insert-users" required /></td>
		        </tr>

		        <tr>
		          <td><label for="user_pass" class="label-insert-users">Mot de passe: </label></td>
		          <td><input type="password" name="user_pass" id="user_pass" class="input-insert-users"maxlength="15" required ></td>
		        </tr>

		        <tr>
		          <td><label for="user_email" class="label-insert-users">E-mail: </label></td>
		          <td><input type="email" name="user_email" id="user_email" class="input-insert-users" required ></td>
		        </tr>

		        <tr>
		          <td><label for="display_name" class="label-insert-users">Display name: </label></td>
		          <td><input type="text" name="display_name" id="display_name" class="input-insert-users" required ></td>
		        </tr>		        	        

		        <tr>
		          <td></td>
		          <td><input value="Insérer" type="submit" />
		          <input type="reset" value="effacer" /></td>
		        </tr>
		    </table>
	  </form>

	</div>

<?php include("app/view/layout/footer.inc.php"); ?>
