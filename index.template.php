<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>le blog à chris</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <?php require_once 'header.template.php'; ?>
  <main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- formulaire d'inscription -->
    <div class="container">
      <div class="row  justify-content-space-around align-items-center">
          <div class="col-12 col-lg-3">
            <form action="users.php" method="POST">
              <input type="hidden" name="form" value="formulaire_ajout_user">
              <h2>on se connaît ?</h2>
              <br>
          </div>
          <div class="col-12 col-lg-3">
              <article>
              <label for="user_prenom">prénom:</label>
              <br>
              <input type="text" name="user_prenom" id="user_prenom"> 
              <br>
              <label for="user_nom">nom:</label>
              <br>
              <input type="text" name="user_nom" id="user_nom">
              <br>
          </div>
          <div class="col-12 col-lg-3">
              <label for="user_pseudo">pseudo:</label>
              <br>
              <input type="text" name="user_pseudo" id="user_pseudo">
              <br>
              <label for="user_email">adresse mail:</label>
              <br>
              <input type="text" name="user_email" id="user_email">
              <br>
          </div>
          <div class="col-12 col-lg-3">
              <label for="user_password">mot de passe:</label>
              <br>
              <input type="password" name="user_password" id="user_password">
              <br>
              <label for="user_picture">photo de profil:</label>
              <br>
              <input type="text" name="user_picture" id="user_picture">
              <br>
              <input type="submit" value="Envoyer" class="button_submit">
              </article>
            </form>
          </div>
        </div>
      </div>
  </main>
  <?php require_once 'footer.template.php'; ?>
  <?php require_once 'index.php'; ?>
</body>

</html>