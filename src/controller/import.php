<?php 
require_once __DIR__.'/../model/model.php';
$uploaddir = __DIR__.'/../../files/';
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
$fileType =  $_FILES['uploadfile']['type'];

switch ($fileType) {
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
	case 'text/csv':
	case 'application/vnd.ms-excel':
		echo "Excel file ";
		echo " In future import excel/csv";
		break;
	case 'text/xml':
	case 'application/xml':
		echo "xml-file ";
		require_once __DIR__.'/importXml.php';
		break;
	default:
		echo "Wrong file type ";
		break;
}

?>