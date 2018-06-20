<?php 
include_once ROOT. '/model/Import.php';

class ImportController
{
	public $uploaddir;
	public $uploadfile;
	public $fileType;
	public $file;
	
	function __construct()
	{
		$this->file = $_FILES;
		$this->uploaddir = ROOT.'/files/';
		$this->uploadfile = $this->uploaddir.basename($this->file['uploadfile']['name']);
		$this->fileType =  $this->file['uploadfile']['type'];
	}

	public function actionFile()
	{
		switch ($this->fileType) {
			case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
			case 'text/csv':
			case 'application/vnd.ms-excel':
				echo "Excel file ";
				echo " In future import excel/csv <a href='/'> Go Home </a>";
				break;
			case 'text/xml':
			case 'application/xml':
				echo "xml-file ";
				$this->CopyFile();
				$this->ImportDataXML();
				break;
			default:
				echo "Wrong file type ";
				break;
		}
	}

	protected function CopyFile()
	{
		if (copy($this->file['uploadfile']['tmp_name'], $this->uploadfile)){
			echo "<h3>The file was successfully uploaded to the server</h3>";
		}else { echo "<h3>Error! The file could not be uploaded to the server!</h3>"; exit; }
	}

	protected function ImportDataXML()
	{
		$mimeType = mime_content_type($this->uploadfile);
		switch ($mimeType) {
			case 'text/xml':
			case 'application/xml':
				$xml = simplexml_load_file($this->uploadfile);
				// foreac <Model /> & insert to DB
				foreach ($xml->Model as $model) {
					$thisMake=$model->attributes()['Make'];
					$thisModel=$model->attributes()['Model'];
					$makeID = Import::getMakeID($thisMake);
					if ($makeID)
				    {
						Import::setModel($makeID, $thisModel);
				    }else{
						$makeID = Import::setMake($thisMake);
						Import::setModel($makeID, $thisModel);
				    }
				};
				require_once(ROOT . '/view/makes/test.php');
				// unlink($this->uploadfile);
				break;
			
			default:
				echo "Some wrong file";
				break;
		}
	}

		
}

?>