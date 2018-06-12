<?php 
include __DIR__.'/../controller/modelsList.php';?>
<ul class="modelsList">
<?php foreach ($modelsList as $key => $model) {?>
	<li> <a href="#"><?php echo $model['model'];?></a></li>
<?php } ?>
</ul>

