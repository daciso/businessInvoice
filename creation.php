<?php
  $title = "BusinessInvoiceIdmin|Creation";
  include "views/create.php";
?>

<!DOCTYPE html>
<html lang="en">
  <?php include "views/head.php"; ?>
  <body>
    <?php include "views/header.php"; ?>
    <div class="container">
      <h1>BusinessInvoiceAdmin</h1>
      <form action="creation.php" method="POST" class="loading">
        <label for="date">Compila il seguente form con i dati richiesti per crare la fattura.</label><br>
        <label for="date">Data: </label>
        <input type="date" name="date" id="date">
        <label for="data-company">Dati Azienda: </label>
        <input type="text" name="data-company" id="data-company">
        <label for="data-client">Dati Cliente: </label>
        <input type="text" name="data-client" id="data-client">
        <label for="object">Oggetto Fattura: </label>
        <textarea name="object" id="object"></textarea>
        <label for="price">Prezzo: </label>
        <input type="number" name="price" id="price">
        <label for="password" style="display:<?php echo $style ?>">Per creare altre fatture è richiesta una password:</label>
        <input type="password" name="password" id="password" style="display:<?php echo $style ?>">

        <?php
          if (isset($_POST["load"])) {
            if ($createCount >= 3) {
              if ($password != "S@IDJIW29388") {
                echo '<label for="password" style="color: red">Password Errata!!</label>';
              }
            }
          }
        ?>

        <input type="submit" name="load" id="load" value="carica fattura">
      </form>
    </div>
    <?php include "views/footer.php"; ?>
    <script type="text/javascript" src="assets/js/script.js"></script>
  </body>
</html>