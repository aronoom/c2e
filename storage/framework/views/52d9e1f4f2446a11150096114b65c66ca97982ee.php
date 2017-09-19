<?php $__env->startSection('title'); ?>
	Ajout d'une chapitre
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style('css/form.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<h3>Ajouter une chapitre</h3>
	<?php echo Form::open(['url' => 'chapitre', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>

		<div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
			<?php echo Form::label('Titre'); ?>

			<?php echo Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Titre du chapitre']); ?>

			<?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
			<div class="content-input">
				<?php echo Form::label('Contenu'); ?>

				<?php echo Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control textarea', 'placeholder' => 'description du chapitre']); ?>

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