<h1><?= $title ?></h1>


<?php if(is_array($sales_pages)); ?>
<?php foreach($sales_pages as $sale); ?>
<div id = "sales">
	<img class = "thumbnail" src = <?= $sale->thumbname ?> />
	<div class = "location"><?= $sale->location ?> </div>
	<div class = "price"><?= $sale->price ?></div>
	</div>
	<?php endforeach; ?>
<?php endif;?>
