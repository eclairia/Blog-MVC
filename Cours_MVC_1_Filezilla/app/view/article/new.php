<?php include("app/view/layout/header.inc.php") ?>

  <form id="form_post" method="post" action="?module=article&action=new">
    <table>
      <h2>Créer un article</h2><br>
        <tr>
          <td><label for="post_category">Catégorie</label></td>
          <td>

            <?php 

              /*
              *Paramètre 1: Name de la balise select
              *Paramètre 2: Attribut class
              *Paramètre 3: Attribut id
              *Paramètre 4: Attend un tableau de données
              *Paramètre 5: id de la colonne du tableau (partie de gauche)
              *Paramètre 6: valeur de la colonne du tableau (partie de droite)
              */

              scrolllist("post_category", "dropdown", "listcat", $categories, "cat_id", "cat_descr"); 

            ?>

          </td>
        </tr>

        <tr>
          <td><label for="post_title"> Titre </label></td>
          <td><input name="post_title" type="text" maxLenght="200" required /></td>
        </tr>

        <tr>
          <td><label for="post_content"> contenu </label></td>
          <td><textarea name="post_content" rows="10" cols="100" required ></textarea></td>
        </tr>

        <tr>
          <td></td>
          <td><input value="Enregistrer" type="submit" /><input type="reset" value="effacer" /></td>
        </tr>
    </table>
  </form>

<?php include("app/view/layout/footer.inc.php") ?>