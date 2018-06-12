<?php 
include __DIR__.'/../model/model.php';
$makeID = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$modelsList=getModelsList($makeID);


?>