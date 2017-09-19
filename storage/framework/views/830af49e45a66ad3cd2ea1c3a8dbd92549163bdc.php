<?php $__env->startSection('contenu'); ?>
	<h3>Nouveau discussion</h3>
	<?php echo Form::open(['route' => 'forum.store', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>

		<div class="form-group <?php echo $errors->has('sujet') ? 'has-error' : ''; ?>">
			<?php echo Form::label('sujet','Sujet'); ?>

			<?php echo Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Sujet du forum']); ?>

			<?php echo $errors->first('sujet', '<small class="help-block">:message</small>'); ?>

		</div>
		<?php /*<div class="form-group <?php echo $errors->has('Type[]') ? 'has-error' : ''; ?>">
			<div class="content-input">
				<?php echo Form::label('Types[]','Catégorie'); ?>

				<?php echo Form::select('Types[]',App\Type::lists('nom','id'),null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Déscription du Forum','multiple'=>true]); ?>

				<?php echo $errors->first('Types[]', '<small class="help-block">:message</small>'); ?>

			</div>
		</div>*/ ?>
		<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
			<div class="content-input">
				<?php echo Form::label('description','Déscription du forum'); ?>

				<?php echo Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control textarea', 'placeholder' => 'Déscription du Forum']); ?>

				<?php echo $errors->first('description', '<small class="help-block">:message</small>'); ?>

			</div>
		</div>
		<div class="content-btn">
			<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']); ?>

		</div>
	<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>