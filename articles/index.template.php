<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>le blog à chris</title>
</head>

<body>
  <?php require_once '../header.template.php'; ?>
  <main>
    <!-- liste de tous les tweets classés du plus récent au moins récent -->
    <h2>tweets récents</h2>
    <br><br>
    <div class="grid">
      <?php foreach ($tweets as $tweet): ?>
        <article>
        <h3>
          <?php echo $tweet['titre'] ?>
        </h3><br>
        <p>
          <?php echo $tweet['contenu'] ?>
        </p><br>
        <p>
          <?php echo "Écrit le " . date("d/m/Y", strtotime($tweet['date'])) . " à " . date("H:i", strtotime($tweet['date']))?>
        </p><br>
        <form action="delete.php" method="POST">
          <input type="hidden" name="form" value="formulaire_supp_article">
          <input type="hidden" name="tweet_id" value="<?php echo $tweet['id'] ?>">
          <input type="submit" value="Supprimer">
        </form> <hr>
        </article>
      <?php endforeach; ?>
    </div>
    <br><br>
    <!-- formulaire pour poster un nouveau tweet -->
    <br><br>

    <h2>poste un tweet !</h2>
    <button class="modal-btn modal-trigger">créer un nouveau tweet</button>
    <div class="modal-container">

      <div class="overlay modal-trigger"></div>

        <div class="modal">
        <article>
        <form action="ajout.php" method="POST">
          <input type="hidden" name="form" value="formulaire_ajout_article">
          <label for="titre">titre du tweet:</label>
          <br>
          <input type="text" name="titre" id="titre">
          <br>
          <label for="contenu">contenu du tweet:</label>
          <br>
          <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
          <br>
          <label for="tag">tag:</label>

          <select name="tag" id="tag">
          <option value="">choisis un tag</option>
          <option value="bleu">triste</option>
          <option value="rouge">fache</option>
          <option value="jaune">energetique</option>
          <option value="vert">content</option>
          </select>
          <br>
          <input type="submit" value="Envoyer" class="close-modal modal-trigger">
        </form>
          </article>
        </div>
    </div>
    <br><br>
  </main>
  <script src="../app.js"></script>
</body>
<?php require_once '../footer.template.php'; ?>

</html>