<?php
  $dirInvoice = "registry/invoiceNumber.txt";
  $fileInvoice = fopen($dirInvoice, "r");
  $invoiceNumber = fread($fileInvoice, filesize($dirInvoice));
  fclose($fileInvoice);
  $dirCount = "registry/createCount.txt";
  $fileCount = fopen($dirCount, "r");
  $createCount = fread($fileCount, filesize($dirCount));
  fclose($fileCount);
  
  $countWrite = fopen($dirCount, "w");
  fwrite($countWrite, ++$createCount);
  fclose($countWrite);
  if ($createCount >= 2) {
    $style = "block";
  } else {
    $style = "none";
  }

  if (isset($_POST["load"])) {   
    
    $password = htmlspecialchars($_POST['password']);

    if($createCount > 1 && $password == "S@IDJIW29388") {
        $date = htmlspecialchars($_POST["date"]);
        $dataCompany = htmlspecialchars($_POST["data-company"]);
        $dataClient = htmlspecialchars($_POST["data-client"]);
        $object = htmlspecialchars($_POST["object"]);
        $noIvaPrice = htmlspecialchars($_POST["price"]);
        $price = $noIvaPrice * 1.22;
        $content = '
          <div class="area-visual cl">
            <div class="up">
              <div class="logo-visual"><img src="assets/images/BIA_logo_home.png" width="100px" alt="logo-home"></div>
              <div class="date"><strong>data fattura:</strong> ' . $date . '</div>
              <div class="company-data"><strong>dati dell\' azienda:</strong> ' . $dataCompany . '</div>
            </div>
            <div class="middle">
              <div class="client-data"><strong>dati del cliente:</strong><br>' . $dataClient . '</div>
              <div class="invoice-object"><strong>oggetto della fattura:</strong><br>' . $object . '</div>
            </div>
            <div class="bottom">
              <div class="price"><strong>totale comprensivo di IVA:</strong> ' . $price . ' €</div>
              <div class="calce"><img src="assets/images/TeamAlphaLogo1.svg" width="170px" alt="logo"></div>
            </div>
          </div>';
    
        $invoice = fopen("invoices/" . $invoiceNumber . ".php", "w");
        fwrite($invoice, $content);
        fclose($invoice);
        $invoiceWrite = fopen($dirInvoice, "w");
        fwrite($invoiceWrite, $invoiceNumber += 001);
        fclose($invoiceWrite);
    }
    if ($createCount == 2) {
      $date = htmlspecialchars($_POST["date"]);
      $dataCompany = htmlspecialchars($_POST["data-company"]);
      $dataClient = htmlspecialchars($_POST["data-client"]);
      $object = htmlspecialchars($_POST["object"]);
      $noIvaPrice = htmlspecialchars($_POST["price"]);
      $price = $noIvaPrice * 1.22;
      $content = '
        <div class="area-visual cl">
          <div class="up">
            <div class="logo-visual"><img src="assets/images/BIA_logo_home.png" width="100px" alt="logo-home"></div>
            <div class="date"><strong>data fattura:</strong> ' . $date . '</div>
            <div class="company-data"><strong>dati dell\' azienda:</strong> ' . $dataCompany . '</div>
          </div>
          <div class="middle">
            <div class="client-data"><strong>dati del cliente:</strong><br>' . $dataClient . '</div>
            <div class="invoice-object"><strong>oggetto della fattura:</strong><br>' . $object . '</div>
          </div>
          <div class="bottom">
            <div class="price"><strong>totale comprensivo di IVA:</strong> ' . $price . ' €</div>
            <div class="calce"><img src="assets/images/TeamAlphaLogo1.svg" width="170px" alt="logo"></div>
          </div>
        </div>';
  
      $invoice = fopen("invoices/" . $invoiceNumber . ".php", "w");
      fwrite($invoice, $content);
      fclose($invoice);
      $invoiceWrite = fopen($dirInvoice, "w");
      fwrite($invoiceWrite, $invoiceNumber += 001);
      fclose($invoiceWrite);
    }
  }
?>