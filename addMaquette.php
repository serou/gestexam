<?php
require('common/library/php-excel-reader/excel_reader2.php');
require('common/library/SpreadsheetReader.php');
require('model/BDD.php');
require('model/Map.php');

$map = new Map();

if(isset($_POST['Submit'])){

  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

    $uploadFilePath = 'common/uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());

    echo "You have total ".$totalSheet." sheets".

    $html="<table border='1'>";
    $html.="<tr><th>code_filiere</th><th>code_ue</th><th>lib_ue</th><th>lib_ecue</th><th>code_ecue</th><th>semestre</th><th>credit_ue</th><th>credit_ecue</th><th>anscol</th></tr>";

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row){
        $html.="<tr>";
        $code_filiere = isset($Row[0]) ? $Row[0] : '';
        $code_ue = isset($Row[1]) ? $Row[1] : '';
        $lib_ue = isset($Row[2]) ? $Row[2] : '';
        $lib_ecue = isset($Row[3]) ? $Row[3] : '';
        $code_ecue = isset($Row[4]) ? $Row[4] : '';
        $semestre = isset($Row[5]) ? $Row[5] : '';
        $credit_ue = isset($Row[6]) ? $Row[6] : '';
        $credit_ecue = isset($Row[7]) ? $Row[7] : '';
        $anscol = isset($Row[8]) ? $Row[8] : '';

        $html.="<td>".$code_filiere."</td>";
        $html.="<td>".$code_ue."</td>";
        $html.="<td>".$lib_ue."</td>";
        $html.="<td>".$lib_ecue."</td>";
        $html.="<td>".$code_ecue."</td>";
        $html.="<td>".$semestre."</td>";
        $html.="<td>".$credit_ue."</td>";
        $html.="<td>".$credit_ecue."</td>";
        $html.="<td>".$anscol."</td>";

        $html.="</tr>";

    $InsertMaquette = $map->setMaquette($code_filiere, $code_ue, $lib_ue, $lib_ecue, $code_ecue, $semestre, $credit_ue, $credit_ecue, $anscol );

     }

    }

    $html.="</table>";
    echo $html;
    echo "<br />Data Inserted in dababase";

  }else {
    die("<br/>Sorry, File type is not allowed. Only Excel file.");
  }

}else{
    require("vew/vueAddMaquette.php");
}

?>
