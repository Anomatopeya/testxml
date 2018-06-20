<?php

include_once ROOT. '/model/Makes.php';

class MakesController {

	public function actionIndex()
	{
		
		$makesList = array();
		$makesList = Makes::getMakesList();

		require_once(ROOT . '/view/makes/index.php');

		return true;
	}

	public function actionMakes($id)
	{
		if ($id) {
			$makesItem = Makes::getMakesItemByID($id);

			require_once(ROOT . '/view/models/modelsList.php');

		}

		return true;

	}

}

