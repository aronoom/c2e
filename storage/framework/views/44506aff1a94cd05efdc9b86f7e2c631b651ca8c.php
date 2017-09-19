<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style('css/modal.css')); ?>

	<?php echo e(Html::style('css/profil.css')); ?>

	<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
	Profil
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<?php if(session()->has('ok')): ?>
		<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
	<?php endif; ?>
	<h3>
		<a class="ancre" id="profil">#</a> Profil
		<?php if(!Auth::guest() && (Auth::user()->id == $user->id || Auth::user()->type_utilisateur->terme == "admin")): ?>
			<img src="<?php echo e(asset('icon/photo.svg')); ?>" id="btn-photo" class="btn-crud"/>
			<a href="<?php echo e(route('user.password')); ?>"><img src="<?php echo e(asset('icon/pwd.svg')); ?>" class="btn-crud"/></a>
			<a href="<?php echo e(route('user.edit', [$user->id])); ?>"><img src="<?php echo e(asset('icon/edit.svg')); ?>" class="btn-crud"/></a>
		<?php endif; ?>
		<?php if(!Auth::guest() && Auth::user()->type_utilisateur->terme == "admin"): ?>
			<?php echo Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'route' => ['user.destroy', $user->id]]); ?>

				<img src="<?php echo e(asset('icon/del.svg')); ?>"
					 class="btn-crud"
					 onclick="if(confirm('Voulez-vous vraiment supprimé cet utilisateur?')) submit()"/>
			<?php echo Form::close(); ?>

			<img src="<?php echo e(asset('icon/role.svg')); ?>" class="btn-crud" id="btn-role"/>
		<?php endif; ?>
	</h3>
	<div class="user-form-role">
		<?php echo Form::Model($user,['route' => ['user.updateRole',$user->id], 'method' => 'put', 'files'=>true, 'class' => 'form-horizontal panel']); ?>

		<div class="form-group-checkbox">
			<br/>
			<?php foreach($roles as $role): ?>
			<div class="form-group-inline <?php echo $errors->has('etudiant') ? 'has-error' : ''; ?>">
				<?php echo Form::radio('type_utilisateur_id', $role->id, ['class' => 'form-control-inline']); ?>

				<?php echo Form::label('type_utilisateur_id', $role->terme, ['class' => 'form-control-inline']); ?>

				<?php echo $errors->first('adresse', '<small class="help-block">:message</small>'); ?>

			</div><br/>
			<?php endforeach; ?>
			<div class="content-btn">
				<div class="pull-right">
					<input type="submit" value="Enroler" class="btn btn-primary">
					<input type="button" value="Annuler" id="btn-close-role" class="btn btn-default">
				</div>
			</div><br/>
		</div>
		<?php echo Form::close(); ?>

	</div>

	<div class="profil-content">
		<img src="<?php echo e(asset($user->image)); ?>" class="profil-photo"/>
		<span class="profil-label">Nom :</span> <?php echo e($user->name." ".$user->prenom); ?> <br/>
		<span class="profil-label">Age :</span> <?php echo 2017 - $user->annee_nais; ?> ans <br/>
		<span class="profil-label">Email :</span> <?php echo e($user->email); ?> <br/>
		<span class="profil-label">Domicile :</span> <?php echo e($user->adresse); ?> <br/>
		<?php if($user->etudiant): ?>
			<span class="profil-label">Etudiant à :</span><?php echo e($user->lieu); ?><br/>
		<?php else: ?>
			<span class="profil-label">Travail à :</span><?php echo e($user->lieu); ?><br/>
		<?php endif; ?>
		<span class="profil-label">Domaine  :</span><?php echo e($user->domaine); ?>

		<?php if($user->type_utilisateur->terme != 'simple'): ?>
			<br/><span class="profil-label">Role :</span> <code><?php echo e($user->type_utilisateur->terme); ?></code><br/>
		<?php endif; ?>
	</div>

	<?php if(!empty($tuto_valides)): ?>
		<h3><a class="ancre" id="tuto">#</a> Tutoriels rédigés</h3>
		<?php foreach($tuto_valides as $tutoriel): ?>
			<div class="panel-tuto">
				<img class="img-tuto" src='<?php echo asset($tutoriel->badget->image); ?>'/>
				<div class="container-tuto-info">
					<div class="tuto-description">
						<a href="<?php echo e(route('tutoriel.show', [$tutoriel->id])); ?>">
							<p  class="paragraphe"> <?php echo e($tutoriel->description); ?> </p>
						</a>
						<?php /* <?php echo e(link_to_route('tutoriel.show', $tutoriel->description, [$tutoriel->id])); ?> */ ?>
					</div>
					<div class="tuto-titre">
						<?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto'])); ?><br/>
						<span class="nom-auteur"> Par <?php echo e($tutoriel->user->name. ' ' .$tutoriel->user->prenom); ?>,</span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if(!Auth::guest() && (Auth::user()->id == $user->id || Auth::user()->type_utilisateur->terme == "validteur" || Auth::user()->type_utilisateur->terme == "admin")): ?>
		<?php if(!empty($tuto_nonValides)): ?>
			<h3><a class="ancre" id="tuto">#</a> Requêtes de validations</h3>
			<?php foreach($tuto_nonValides as $tutoriel): ?>
				<div class="panel-tuto">
					<img class="img-tuto" src='<?php echo asset($tutoriel->badget->image); ?>'/>
					<div class="container-tuto-info">
						<div class="tuto-description">
							<a href="<?php echo e(route('tutoriel.show', [$tutoriel->id])); ?>">
								<p  class="paragraphe"> <?php echo e($tutoriel->description); ?> </p>
							</a>
						</div>
						<div class="tuto-titre">
							<?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto'])); ?><br/>
							<span class="nom-auteur"> Par <?php echo e($tutoriel->user->name. ' ' .$tutoriel->user->prenom); ?>,</span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("navigation"); ?>
	<ul>
		<li>
			<a href="#profil">PROFIL</a>
		</li>
		<?php if(!empty($tuto_valides)): ?>
		<li>
			<a href="#tuto">TUTORIELS REDIGES</a>
			<ul>
				<?php foreach($tuto_valides as $tutoriel): ?>
					<li><?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => ''])); ?></li>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(!Auth::guest() && (Auth::user()->id == $user->id || Auth::user()->type_utilisateur->terme == "validteur" || Auth::user()->type_utilisateur->terme == "admin")): ?>
			<?php if(!empty($tuto_nonValides)): ?>
				<li>
					<a href="#tuto">REQUETES DE VALIDATIONS</a>
					<ul>
						<?php foreach($tuto_nonValides as $tutoriel): ?>
							<li><?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => ''])); ?></li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
	<div class="modal" id="modal-photo">
		<div class="modal-panel">
			<div class="modal-header">Photo</div>
			<?php echo Form::Model($user,['route' => ['user.updatePhoto',$user->id], 'method' => 'put', 'files'=>true, 'class' => 'form-horizontal panel']); ?>

			<div class="form-group <?php echo $errors->has('image_fichier') ? 'has-error' : ''; ?>">
				<?php echo Form::file('image_fichier', null, ['class' => 'form-control', 'placeholder' => 'image_fichier']); ?>

				<?php echo $errors->first('image_fichier', '<small class="help-block">:message</small>'); ?>

			</div>
			<div class="modal-footer">
				<?php echo Form::submit('Enregistrer', ['class' => 'modal-btn-primary']); ?>

				<input class="modal-btn modal-close" type="button" value="Annuler"/>
			</div>
			<?php echo Form::close(); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script>
		$(function () {
			$('#btn-role').click(function () {
				$('.user-form-role').slideToggle(200);
            })
            $('#btn-close-role').click(function () {
                $('.user-form-role').slideUp(200);
            })

			$('#btn-photo').click(function () {
				$('#modal-photo').toggle()
            })

            $('.modal-close').click(function () {
                $('#modal-photo').toggle()
            })
        })
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>