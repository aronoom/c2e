<?php $__env->startSection('style'); ?>
<?php echo e(Html::style('css/form.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
	<div class="container">
		<h3>Création d'un utilisateur</h3>
		<div>
				<?php echo Form::open(['url' => 'user', 'method' => 'post','files'=>true, 'class' => 'form-horizontal panel']); ?>

				<div class="form-group <?php echo $errors->has('name') ? 'has-error' : ''; ?>">
					<?php echo Form::label('name','Nom et Prénom'); ?>

					<?php echo Form::text('name', null, ['class' => 'form', 'placeholder' => 'JEAN Rakoto']); ?>

					<?php echo $errors->first('name', '<small class="help-block">:message</small>'); ?>

				</div>
				<div class="form-group <?php echo $errors->has('image_fichier') ? 'has-error' : ''; ?>">
					<?php echo Form::label('image_fichier','Photo de votre avatar'); ?>

					<?php echo Form::file('image_fichier', null, ['class' => 'form-control', 'placeholder' => 'image_fichier']); ?>

					<?php echo $errors->first('image_fichier', '<small class="help-block">:message</small>'); ?>

				</div>
				<div class="form-group <?php echo $errors->has('login') ? 'has-error' : ''; ?>">
					<?php echo Form::label('login','Login'); ?>

					<?php echo Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'jeanrak']); ?>

					<?php echo $errors->first('login', '<small class="help-block">:message</small>'); ?>

				</div>
				<div class="form-group <?php echo $errors->has('telephone') ? 'has-error' : ''; ?>">
					<?php echo Form::label('telephone','Numéro de téléphone'); ?>

					<?php echo Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '+261']); ?>

					<?php echo $errors->first('telephone', '<small class="help-block">:message</small>'); ?>

				</div>
				<div class="form-group <?php echo $errors->has('adresse') ? 'has-error' : ''; ?>">
					<?php echo Form::label('adresse','Adresse postale'); ?>

					<?php echo Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Antananarivo 67ha Lot ....']); ?>

					<?php echo $errors->first('adresse', '<small class="help-block">:message</small>'); ?>

				</div>
				<div class="form-group <?php echo $errors->has('Motif_insrciption') ? 'has-error' : ''; ?>">
					<?php echo Form::label('Motif_insrciption','Quelle est votre motif d\'inscription ?'); ?>

					<?php echo Form::textarea('Motif_insrciption', null, ['class' => 'form-control textarea', 'placeholder' => 'Mon motif d\'inscription .......']); ?>

					<?php echo $errors->first('Motif_insrciption', '<small class="help-block">:message</small>'); ?>

				</div>

				<div class="form-group <?php echo $errors->has('email') ? 'has-error' : ''; ?>">
					<?php echo Form::label('email','Adresse E-Mail'); ?>

					<?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'c2e@gmail.com']); ?>

					<?php echo $errors->first('email', '<small class="help-block">:message</small>'); ?>

				</div>

				<div class="form-group <?php echo $errors->has('password') ? 'has-error' : ''; ?>">
					<?php echo Form::label('password','Mots de passe'); ?>

					<?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']); ?>

					<?php echo $errors->first('password', '<small class="help-block">:message</small>'); ?>

				</div>
				<div class="form-group">
					<?php echo Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']); ?>

				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<?php echo Form::checkbox('admin', 1, null); ?> Administrateur
						</label>
					</div>
				</div>
				<div class="pull-right">
					<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary']); ?>

					<a href="javascript:history.back()" class="btn ">
						<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
					</a>
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>