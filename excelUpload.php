<?php
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('db_config.php');

if(isset($_POST['Submit'])){

  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());

    echo "You have total ".$totalSheet." sheets".

    $html="<table border='1'>";
    $html.="<tr><th>Nce</th><th>Nom</th><th>Prenom</th><th>Date Naiss</th><th>Lieu Naiss</th><th>Nationnalite</th><th>Sexe</th><th>Ufr</th><th>Filiere</th><th>Niveau</th></tr>";

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row){
        $html.="<tr>";
        $nce = isset($Row[0]) ? $Row[0] : '';
        $nom = isset($Row[1]) ? $Row[1] : '';
        $prenom = isset($Row[2]) ? $Row[2] : '';
        $dateNaiss = isset($Row[3]) ? $Row[3] : '';
        $lieuNais = isset($Row[4]) ? $Row[4] : '';
        $nationnalite = isset($Row[5]) ? $Row[5] : '';
        $sexe = isset($Row[6]) ? $Row[6] : '';
        $ufr = isset($Row[7]) ? $Row[7] : '';
        $filiere = isset($Row[8]) ? $Row[8] : '';
        $niveau = isset($Row[9]) ? $Row[9] : '';

        $html.="<td>".$nce."</td>";
        $html.="<td>".$nom."</td>";
        $html.="<td>".$prenom."</td>";
        $html.="<td>".$dateNaiss."</td>";
        $html.="<td>".$lieuNais."</td>";
        $html.="<td>".$nationnalite."</td>";
        $html.="<td>".$sexe."</td>";
        $html.="<td>".$ufr."</td>";
        $html.="<td>".$filiere."</td>";
        $html.="<td>".$niveau."</td>";

        $html.="</tr>";
        $req = 'insert into t_etudiant_inscrit (nce, nom, prenom, dateNaiss, lieuNais, nationnalite, sexe, ufr, filiere, niveau) values("'.$nce.'","'.$nom.'","'.$prenom.'","'.$dateNaiss.'","'.$lieuNais.'","'.$nationnalite.'","'.$sexe.'","'.$ufr.'","'.$filiere.'","'.$niveau.'")';
        $bdd->exec( $req);
     }

    }

    $html.="</table>";
    echo $html;
    echo "<br />Data Inserted in dababase";

  }else {
    die("<br/>Sorry, File type is not allowed. Only Excel file.");
  }

}

?>
