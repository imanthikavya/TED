<?php if(isset( $_SESSION['invalid'])) { ?>

<?php  if (count($_SESSION['invalid']) > 0) : ?>
	<div class="error">
		<?php foreach ($_SESSION['invalid'] as $error) : ?>
			<p style="color:red;"><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
	<?php unset($_SESSION['invalid']); ?>
<?php  endif ?>

<?php } ?>