<?php
  $style = "none";
  $dir = "invoices";
  $scan = scandir($dir);
  $scanLen = count($scan);
  $orderedScan = array(); 

  for ($i = 2; $i < $scanLen; $i++) { 
    $exploded = explode(".", $scan[$i]);
    $number = intval($exploded[0]);
    array_push($orderedScan, $number);
  }
  sort($orderedScan);

  for ($i = 0; $i < $scanLen - 2; $i++) { 
    echo 
      '<tr>
        <td>' 
          . $orderedScan[$i] . 
        '</td>
        <td>
          <form action="visualize.php" method="POST"><input type="text" name="name" class="name" value="' . $orderedScan[$i] . '"><input type="submit" name="visual" class="visual" value="visualizza"></form>
        </td>
        <td>
        <form action="visualize.php" method="POST"><input type="text" name="name" class="name" value="' . $orderedScan[$i] . '.php"><input type="submit" name="delete" class="delete" value="elimina">
        <input type="password" name="password" id="password" style="display:'. $style .'" >
        </form>
        </td>
      </tr>';
  }
?>