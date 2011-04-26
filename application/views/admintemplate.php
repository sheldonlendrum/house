<?php
//echo $message;

$stylesheetCSS = array('href' => 'includes/css/adminstyle.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen');

echo doctype('html5');
?>
<head>
    <title>Nationwide Housemovers : <?php echo $title ?></title>
  <?php echo link_tag($stylesheetCSS);?>
   <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/modernizr.js"></script>
</head>
<body>
	<div id ="wrapper">
        <div id ="header">
		<h1 id = "companyName">Nationwide Housemovers Ltd </h1>
		<h4 id = "companyQuote">"The guy who quotes the job, completes the job"</h4>
	    </div>
<div id="leftCol">
 <nav>
		<ul>
		<?php if($this->session->userdata('logged_in')): ?>
			<li><?php echo anchor('admin/dashboard', 'Dashboard');?></li>
			<li><?php echo anchor('admin/editpage','Edit Pages');?>
			<?php if(is_array($cms_pages)): ?>
					<ul>
						<?php foreach($cms_pages as $page): ?>
						<li><a href="<?=base_url();?>admin/editpage/index/<?= $page->id ?>/<?php echo url_title($page->name,'dash', TRUE); ?>"><?=$page->name?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				</li>
			<li><?php echo anchor('#','Gallery');?>
			<ul>
				<li><?php echo anchor('admin/addimage','Add Image');?></li>
				<li><?php echo anchor('admin/deleteimage','Delete Image');?></li>
			</ul>
			</li>
			<li><?php echo anchor('','Sales');?>
			<ul>
				<li><?php echo anchor('admin/addsale','Add Sale');?></li>
				<li><?php echo anchor('','Edit Sale');?>
		                	<?php if(is_array($sales_pages)): ?>
									<ul>
										<?php foreach($sales_pages as $sale): ?>
										<li><a href="<?=base_url();?>admin/editsale/index/<?= $sale->id ?>/<?php echo url_title($sale->name,'dash', TRUE); ?>"><?=$sale->name?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								</li>
				</li>
				<li><?php echo anchor('#','Delete Sale');?></li>
			</ul>
				<li><?php echo anchor('admin/home/logout','Log Out');?></li>
			</li>
		<?php else: ?>
		<?php redirect('admin/home'); ?>
			<?php endif; ?>
    </nav>
</div><!-- Left Col End -->
     <div id="content">
     <h1><?= $title ?></h1>
    <p> <?= $content // loads template file ?> </p>
   </div><!-- Content End -->     
    
    <div id="footer">&copy; Houses LTD <?php echo date('Y');?></div>
	</div> <!-- Wrapper Close -->
<!-- jQuery Files -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script> 
<script>window.jQuery||document.write('<script src="<?php echo base_url(); ?>includes/js/jquery-1.5.1.min.js">\x3C/script>');</script>
<script type="text/javascript" src="<?php echo base_url(); ?>includes/js/placeholder.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('input, textarea').placeholder();
});
</script>
</body>
