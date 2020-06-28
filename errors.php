<?php  if (count($errors) > 0) : ?>
	<div class="row">
		<div class="col text-center text-danger">
			<?php foreach ($errors as $error) : ?>
				<p><?php echo $error ?></p>
			<?php endforeach ?>
		</div>
  </div>
<?php  endif ?>