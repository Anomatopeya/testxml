<?php 
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)){
	echo "<h3>The file was successfully uploaded to the server</h3>";
}else { echo "<h3>Error! The file could not be uploaded to the server!</h3>"; exit; }

$mimeType = mime_content_type($uploadfile);
switch ($mimeType) {
	case 'text/xml':
	case 'application/xml':
		$xml = simplexml_load_file($uploadfile);
		// foreac <Model /> & insert to DB
		foreach ($xml->Model as $model) {
			$thisMake=$model->attributes()['Make'];
			$thisModel=$model->attributes()['Model'];
			$makeID = getMakeID($thisMake);
			if ($makeID)
		    {
				setModel($makeID, $thisModel);
		    }else{
				$makeID = setMake($thisMake);
				setModel($makeID, $thisModel);
		    }
		};
		unlink($uploadfile);
		break;
	
	default:
		echo "Some wrong file";
		break;
}
 ?>