<?php $__env->startSection('title'); ?>
	Inscription
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<h3>Inscription</h3>

	<?php echo Form::open(['url' => 'user', 'method' => 'post','files'=>true, 'class' => 'form-horizontal panel']); ?>

		<div class="<?php echo $errors->has('name') ? 'has-error' : ''; ?>">
			<div class="form-group-2">
				<?php echo Form::label('name','Nom *'); ?>

				<?php echo Form::text('name', null, ['class' => 'form', 'placeholder' => 'RAKOTO']); ?>

			</div>
			<div class="form-group-2 <?php echo $errors->has('prenom') ? 'has-error' : ''; ?>">
				<?php echo Form::label('prenom','Prénom(s) '); ?>

				<?php echo Form::text('prenom', null, ['class' => 'form', 'placeholder' => 'Jean']); ?>

			</div>
			<?php echo $errors->first('name', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('login') ? 'has-error' : ''; ?>">
			<?php echo Form::label('login','Pseudo *'); ?>

			<?php echo Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'jeanrak']); ?>

			<?php echo $errors->first('login', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('email') ? 'has-error' : ''; ?>">
			<?php echo Form::label('email','Email *'); ?>

			<?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'c2e@gmail.com']); ?>

			<?php echo $errors->first('email', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('age') ? 'has-error' : ''; ?>">
			<?php echo Form::label('annee_nais','Année de naissance'); ?>

			<?php echo Form::number('annee_nais', 1995, ['class' => 'form-control', 'placeholder' => '']); ?>

			<?php echo $errors->first('annee_nais', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('telephone') ? 'has-error' : ''; ?>">
			<?php echo Form::label('telephone','Numéro de téléphone'); ?>

			<?php echo Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '+261']); ?>

			<?php echo $errors->first('telephone', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('adresse') ? 'has-error' : ''; ?>">
			<?php echo Form::label('adresse','Adresse'); ?>

			<?php echo Form::text('adresse', null, ['class' => 'form-control']); ?>

			<?php echo $errors->first('adresse', '<small class="help-block">:message</small>'); ?>

		</div>
		<hr/>

		<label>Fonction</label>
		<div class="form-group-checkbox">
			<div class="form-group-inline <?php echo $errors->has('etudiant') ? 'has-error' : ''; ?>">
				<?php echo Form::radio('etudiant', true, ['class' => 'form-control-inline']); ?>

				<?php echo Form::label('etudiant','Etudiant', ['class' => 'form-control-inline']); ?>

				<?php echo $errors->first('adresse', '<small class="help-block">:message</small>'); ?>

			</div>
			<div class="form-group-inline <?php echo $errors->has('etudiant') ? 'has-error' : ''; ?>">
				<?php echo Form::radio('etudiant', false, false, ['class' => 'form-control']); ?>

				<?php echo Form::label('etudiant','Employé', ['class' => 'form-control-inline']); ?>

			</div>
		</div>
		<div class="form-group <?php echo $errors->has('domaine') ? 'has-error' : ''; ?>">
			<?php echo Form::label('domaine','Domaine'); ?>

			<?php echo Form::text('domaine', null, ['class' => 'form-control', 'placeholder' => 'Génie logiciel et Base de donnée']); ?>

			<?php echo $errors->first('adresse', '<small class="help-block">:message</small>'); ?>

		</div>
		<div class="form-group <?php echo $errors->has('domaine') ? 'has-error' : ''; ?>">
			<?php echo Form::label('lieu','Lieu'); ?>

			<?php echo Form::text('lieu', null, ['class' => 'form-control', 'placeholder' => 'Ecole Nationale d\'informatique']); ?>

			<?php echo $errors->first('adresse', '<small class="help-block">:message</small>'); ?>

		</div>
		<?php /*<hr/>
		<div class=" form-group <?php echo $errors->has('password') ? 'has-error' : ''; ?>">
			<div class="form-group-2">
				<?php echo Form::label('password','Mots de passe *'); ?>

				<?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'mdp1234']); ?>

			</div>
			<div class="form-group-2">
				<?php echo Form::label('password','Confirmation *'); ?>

				<?php echo Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'mdp1234']); ?>

			</div>
			<?php echo $errors->first('password', '<small class="help-block">:message</small>'); ?>

		</div>*/ ?>
		<div class="content-btn ">
			<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary btn-fixed pull-right']); ?>

		</div>
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>