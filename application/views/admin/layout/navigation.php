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
			<li><?php echo anchor('#','Sales');?>
			<ul>
				<li><?php echo anchor('admin/addsale','Add Sale');?></li>
				<li><?php echo anchor('#','Edit Sale');?>
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