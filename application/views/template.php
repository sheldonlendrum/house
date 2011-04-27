<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $name; ?> : Nationwide Housemovers</title>
	<link href="http://house/includes/css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
</head>
<body>

	<div id ="wrapper">
		
		<div id="header">
			
			<h1 id="companyName">Nationwide Housemovers Ltd </h1>
			<h4 id="companyQuote">"The guy who quotes the job, then completes the job"</h4>
			
		</div>
		
		<nav>
			
			<?php if($pages = $this->page_model->getPages()): ?>
			<ul>
				<?php foreach($pages as $page): ?>
					<li><a href="<?=base_url() . $page->permalink ?>" title="<?=$page->name?>"><?=$page->name?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
			
		</nav>

		<div id="metal"> </div>
		
		<section id="content">
			
			<?=$content?>
				
		</section>
		
		<footer>
			
			<p>&copy; Houses LTD <?php echo date('Y');?></p>
			
		</footer>
	</div>

</body>
</html>