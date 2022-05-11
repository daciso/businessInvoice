<?php
  $title = "Business invoice admin|Visualize";
?>

<!DOCTYPE html>
<html lang="en">
  <?php include "views/head.php"; ?>
  <body>
    <?php include "views/header.php"; ?>
    <div class="container">
      <h1>BusinessInvoiceAdmin</h1>

      <?php 
        if(isset($_POST["visual"])) {
            $dir = "invoices/" . htmlspecialchars($_POST["name"]) . ".php";
            $file = fopen($dir, "r");
            echo fread($file, filesize($dir));
            fclose($file);
        
          if(isset($_POST["delete"])) {
            $name = htmlspecialchars($_POST['name']);
            $dir = "invoices/" . $name;
          }
          if (!unlink($dir)) { 
            echo "<p>" . $name . " non puo essere cancellato</p>"; 
          } else { 
              echo "<p>" . $name . " È stato eliminato</p>"; 
            }
        }
      ?>

      <table cellspacing="0" cellpadding="0">
        <tr>
          <th width="200px">Nome Fattura</th>  
          <th>Visualizza</th>
          <th>Elimina</th>
        </tr>
        <?php include "views/visualize_invoice.php"; ?>
      </table>
    </div>
    <?php include "views/footer.php"; ?>
    <script type="text/javascript" src="assets/js/script.js"></script>
  </body>
</html>