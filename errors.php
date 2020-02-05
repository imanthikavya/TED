<?php if(isset( $_SESSION['errors'])) { ?>

<?php  if (count($_SESSION['errors']) > 0) : ?>
	<div class="error">
		<?php foreach ($_SESSION['errors'] as $error) : ?>
			<p style="color:red;"><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
	<?php unset($_SESSION['errors']); ?>
<?php  endif ?>

<?php } ?>