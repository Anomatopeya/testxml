<?php


class Makes
{

	/** Returns list of Models items by Make id
	* @rapam integer &id
	*/

	public static function getMakesItemByID($id)
	{
		$id = intval($id);
		if ($id) {
			$pdo = Db::getConnection();
			$stmt = $pdo->prepare("SELECT model FROM models WHERE make_id = ?");
			$stmt->execute([$id]);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$result = $stmt->fetchAll();
			foreach($result as $key => $row){
				foreach ($row as $mkey => $mvalue) {
					$row[$mkey] = strip_tags($mvalue);
				}
		        $result[$key] = $row;
		    }
			return $result;
		}
	}

	/**
	* Returns an array of Makes items
	*/
	public static function getMakesList() {
		$pdo = Db::getConnection();
		$makesList = array();
		$query = $pdo->query("SELECT * FROM makes");
		$result = $query->fetchAll();
		foreach($result as $key => $row){
			foreach ($row as $mkey => $mvalue) {
				$row[$mkey] = strip_tags($mvalue);
			}
	        $result[$key] = $row;
	    }
		return $result;
}

}