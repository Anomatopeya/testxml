<?php 

class Import
{
	/** Returns make ID by make name or False
	* @rapam string &make
	*/
	public static function getMakeID($make)
	{
		$pdo = Db::getConnection();
		$stmt = $pdo->prepare('SELECT id FROM makes WHERE make = ? LIMIT 1');
		$stmt->execute([$make]);
		if($stmt->rowCount() > 0){
			$result = $stmt->fetch();
			foreach ($result as $key => $makeID) {
				return strip_tags($makeID);
			}
		}else{
			return false;		
		}
	}

	/** Insert new model to models db
	* @rapam integer $makeID, string $model
	*/
	public static function setModel($makeID, $model)
	{	
		$pdo = Db::getConnection();
		$stm = $pdo->prepare("INSERT INTO models (make_id, model) VALUES (?, ?)");
		$stm->execute([$makeID, $model]);
	}

	/** Insert new make to makes db return insert ID
	* @rapam string $make
	*/
	public static function setMake($make)
	{
		$pdo = Db::getConnection();
		$stmt = $pdo->prepare("INSERT INTO makes (make) VALUES (?)");
		$stmt->execute([$make]);
		return $makeID = $pdo->lastInsertId();
	}

}

 ?>