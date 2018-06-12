<?php 
include __DIR__.'/../controller/makesList.php';?>
<ul class="makesList">
<?php foreach ($makesList as $key => $make) {?>
	<li class="makeLi"> <a href="#" class="make" data-model="<?php echo $make['id'];?>"><?php echo $make['make'];?></a></li>
<?php } ?>
</ul>