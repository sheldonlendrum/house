		<?php if(is_array($get_images)): ?>
			
				<?php foreach($get_images as $image): ?>
				<img src ="<?=base_url()?>includes/uploads/gallery/thumbs/<?=$image->thumbname ?>" alt="<?= $image->description?>"> <a href="deleteimage/<?=$image->id?>">Delete</a>
				<?php endforeach; ?>
		<?php endif; ?>
		