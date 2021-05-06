<?php
/*for PhpSpreadsheet usage*/
require $_SERVER['DOCUMENT_ROOT'].'/CEStable/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$target_dir = "../../uploadFiles/";
$inputFileName = $target_dir . basename($_FILES["fileup"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($inputFileName,PATHINFO_EXTENSION));
echo "<h1>File Detail</h1>";
echo "inputFileName: " . $inputFileName."<br>";
echo "uploadOk: " . $uploadOk."<br>";
echo "imageFileType: " . $imageFileType."<br><br>";

echo "Filename: " . $_FILES['fileup']['name']."<br>";
echo "Type : " . $_FILES['fileup']['type'] ."<br>";
echo "Size : " . $_FILES['fileup']['size'] ."<br>";
echo "Temp name: " . $_FILES['fileup']['tmp_name'] ."<br>";
echo "Error : " . $_FILES['fileup']['error'] . "<br>";
// Check if the file is valid
if(isset($_POST["submitbtn"])) {
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  }else {
    if (move_uploaded_file($_FILES["fileup"]["tmp_name"], $inputFileName)){
      echo "The file ". htmlspecialchars( basename( $_FILES["fileup"]["name"])). " has been uploaded.";
      //read Excel

      /**  Identify the type of $inputFileName  **/
      $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
      /**  Create a new Reader of the type that has been identified  **/
      $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
      $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
      /**  Load $inputFileName to a Spreadsheet Object  **/

      $spreadsheet = $reader->load($inputFileName);
      echo $spreadsheet->getSheetCount();
      print_r($spreadsheet->getSheetNames());
      /*
      $spreadsheet->getSheetByName($spreadsheet->getSheetNames()[8]);
      $worksheet = $spreadsheet->getActiveSheet();
      */
      //印出每個worksheet的row/column數
      foreach ($spreadsheet->getSheetNames() as $worksheetName) {
        $worksheet = $spreadsheet->setActiveSheetIndexByName($worksheetName);

        echo '<li>', $worksheetName, '<br />';
        echo 'Rows: ', $worksheet->getHighestDataRow(), '<br />';
        echo ' Columns: ', $worksheet->getHighestDataColumn(), '<br />';
        echo '</li>';
      }
/*      $worksheet = $spreadsheet->setActiveSheetIndexByName($spreadsheet->getSheetNames()[8]);
      $cellD3 = $worksheet->getCell('A1');
      echo 'Value: ', $cellD3->getValue(), '; Address: ', $cellD3->getCoordinate(), PHP_EOL;*/

      //一個COMPONENT TYPE為一個worksheet內容
      $reader->setReadDataOnly(true);

      //testing: write file
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Hello World !');
      $writer = new Xlsx($spreadsheet);
      $writer->save('hello www.xlsx');
    }else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}else{//
  header("Location: newProject.php");
}

?>
