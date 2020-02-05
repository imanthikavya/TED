<?php if(isset( $_SESSION['wrong'])) { ?>

<?php  if (count($_SESSION['wrong']) > 0) : ?>
	<div class="error">
		<?php foreach ($_SESSION['wrong'] as $error) : ?>
			<p style="color:red;"><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
	<?php unset($_SESSION['wrong']); ?>
<?php  endif ?>

<?php } ?>