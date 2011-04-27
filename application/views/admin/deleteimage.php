		<?php if(is_array($get_images)): ?>
				<?php foreach($get_images as $image): ?>
				<div id ="deleteImage">
				<img class="thumbnail" src ="<?=base_url()?>includes/uploads/gallery/thumbs/<?=$image['thumbname']?>" alt="<?= $image['description']?>"> <a href="deleteimage/delete/<?=$image['id']?>">Delete</a>
				</div>
				<?php endforeach; ?>
		<?php endif; ?>
		