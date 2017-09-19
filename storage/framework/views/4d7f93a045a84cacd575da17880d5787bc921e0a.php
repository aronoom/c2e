<?php $__env->startSection('title'); ?>
	Créer un tutoriel
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style('css/form.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<h3>Création du tutoriel</h3>

	<?php echo Form::open(['url' => 'tutoriel', 'method' => 'post','files' => true, 'class' => 'form-horizontal panel']); ?>

		<div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
			<?php echo Form::label('nom','Titre'); ?>

			<?php echo Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Titre du tutoriel']); ?>

			<?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('Types[]') ? 'has-error' : ''; ?>">
			<?php echo Form::label('badget_id','Badge'); ?>

			<?php echo Form::select('badget_id', $badges,null, ['class' => 'form-control', 'placeholder' => '']); ?>

			<?php echo $errors->first('Types[]', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('niveau_id') ? 'has-error' : ''; ?>">
			<?php echo Form::label('niveau_id','Niveau'); ?>

			<?php echo Form::select('niveau_id',$niveaus,null, ['class' => 'form-control']); ?>

			<?php echo $errors->first('niveau_id', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
			<?php echo Form::label('description','Description'); ?>

			<?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

			<?php echo $errors->first('description', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('introduction') ? 'has-error' : ''; ?>">
			<div class="content-input">
				<?php echo Form::label('introduction','Introduction'); ?>

				<?php echo Form::textarea('introduction', null, ['class' => 'form-control textarea']); ?>

				<?php echo $errors->first('introduction', '<small class="help-block">:message</small>'); ?>

			</div>
		</div>
		<div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
			<?php echo Form::label('tags','Tags'); ?>

			<?php echo Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'language c, linux']); ?>

			<?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

		</div>

		<div class="content-btn">
				<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary btn-fixed pull-right']); ?>

		</div>
	<?php echo Form::close(); ?>


	<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
	<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>