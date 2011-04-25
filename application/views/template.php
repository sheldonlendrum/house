<?php

$stylesheetCSS = array('href' => 'includes/css/style.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen');

echo doctype('html5');
?>
<head>
    <title>Nationwide Housemovers : <?php echo $title ?></title>
  <?php echo link_tag($stylesheetCSS);?>
  <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id ="wrapper">
    <div id="header">
	<h1 id = "companyName">Nationwide Housemovers Ltd </h1>
	<h4 id = "companyQuote">"The guy who quotes the job, completes the job"</h4>
    </div>
 <nav>
		<?php if(is_array($cms_pages)): ?>
				<ul>
					<?php foreach($cms_pages as $page): ?>
					<li><a href="<?=base_url() . 'page/' . $page->permalink?>"><?=$page->name?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
    </nav>
		<div id = "metal">
		</div>
     <section id="content">
		<h1><?= $title ?></h1>
       <p> <?= $content // loads template file ?> <p>
        
    </section>
    
    <footer>&copy; Houses LTD <?php echo date('Y');?></footer>
	</div> <!-- Wrapper Close -->

</body>
