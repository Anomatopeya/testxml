<?php 
require_once __DIR__.'/../../db.php';
function getMakeID($thisMake)
{
	global $pdo;
	$stmt = $pdo->prepare('SELECT id FROM makes WHERE make = ? LIMIT 1');
	$stmt->execute([$thisMake]);
	if($stmt->rowCount() > 0){
		$result = $stmt->fetch();
		foreach ($result as $key => $makeID) {
			return strip_tags($makeID);
		}
	}else{
		return false;		
	}
}

function setModel($makeID, $Model)
{
	global $pdo;
	$stm = $pdo->prepare("INSERT INTO models (make_id, model) VALUES (?, ?)");
	$stm->execute([$makeID, $Model]);
}

function setMake($make)
{
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO makes (make) VALUES (?)");
	$stmt->execute([$make]);
	return $makeID = $pdo->lastInsertId();
}

function getMakesList()
{
	global $pdo;
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

function getModelsList($makeID)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT model FROM models WHERE make_id = ?");
	$stmt->execute([$makeID]);
	$result = $stmt->fetchAll();
	foreach($result as $key => $row){
		foreach ($row as $mkey => $mvalue) {
			$row[$mkey] = strip_tags($mvalue);
		}
        $result[$key] = $row;
    }
	return $result;
}
 ?>