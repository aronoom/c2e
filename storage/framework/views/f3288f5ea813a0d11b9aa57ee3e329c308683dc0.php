<?php $__env->startSection('title'); ?>
	<?php echo $tutoriel->nom; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style('css/modal.css')); ?>

	<?php echo e(Html::style('css/form.css')); ?>

	<?php echo e(Html::style('css/navigation.css')); ?>

	<?php echo e(Html::style('css/show_tutoriel.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<?php if(session()->has('ok')): ?>
		<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
	<?php endif; ?>
	<h3> <?php echo $tutoriel->nom; ?>

		<?php if(!Auth::guest() && $tutoriel->validation_id == null && (Auth::user()->id == $tutoriel->user->id || Auth::user()->type_utilisateur->terme == "admin")): ?>
			<a href="<?php echo e(route('chapitre.create', [$tutoriel->id])); ?>"><img src="<?php echo e(asset('icon/add.svg')); ?>" class="btn-crud"/></a>
			<a href="<?php echo e(route('tutoriel.edit', [$tutoriel->id])); ?>"><img src="<?php echo e(asset('icon/edit.svg')); ?>" class="btn-crud"/></a>
			<img id="btn-del-tuto" src="<?php echo e(asset('icon/del.svg')); ?>" class="btn-crud"/>
		<?php endif; ?>
	</h3>
	<div>
		<?php if(!Auth::guest() && Auth::user()->id != $tutoriel->user->id &&
         $tutoriel->validation_id == null && (Auth::user()->type_utilisateur->terme == "validateur" || Auth::user()->type_utilisateur->terme == "admin")): ?>
			<?php echo Form::open(['method' => 'POST', 'style'=>'display:inline-block', 'route' => ['tutoriel.validation', $tutoriel->id]]); ?>

			<?php echo Form::submit('Valider', ['class' => 'btn btn-primary ']); ?>

			<?php echo Form::close(); ?>

		<?php endif; ?>
		<?php if(!Auth::guest() && (Auth::user()->id == $tutoriel->validation_id || Auth::user()->type_utilisateur == 'admin')): ?>
			<?php echo Form::open(['method' => 'POST', 'style'=>'display:inline-block', 'route' => ['tutoriel.annulerValidation', $tutoriel->id]]); ?>

			<?php echo Form::submit('Annuler la validation', ['class' => 'btn btn-primary']); ?>

			<?php echo Form::close(); ?>

		<?php endif; ?>
	</div>
	<div class="alert-default">
		<img class="img-auteur"  src="<?php echo asset($tutoriel->user->image); ?>" alt="">
		<span class="nom-auteur">
			Rédigé par
			<?php echo link_to_route('user.show', $tutoriel->user->name. ' ' .$tutoriel->user->prenom, ['id' => $tutoriel->user->id], ['style' => 'text-decoration: underline']); ?>

			, le <?php echo e(date_format($tutoriel->created_at, 'd M y')); ?>

		</span>
		<p class="tuto-desc">
			<?php echo e($tutoriel->description); ?><br/><br/>
			<?php if($tutoriel->validation != null): ?>
				Validé par <code><?php echo e($tutoriel->validation->name); ?> <?php echo e($tutoriel->validation->prenom); ?></code>
			<?php endif; ?>
		</p>
	</div>

	<h4><a id="intro" class="ancre">#</a> INTRODUCTION</h4>
	<div class="contenu"><?php echo $tutoriel->introduction; ?></div>

	<div class="content-tuto">
		<?php ($numero_section = 1); ?>
		<?php ($numero_chapitre = 1); ?>
		<?php foreach($tutoriel->chapitres as $chapitre): ?>
			<h4>
				<a id="<?= str_replace(' ', "_",$chapitre->nom)?>" class="ancre">#</a>
				<?php echo e($chapitre->nom); ?>


				<?php if(!Auth::guest() && $tutoriel->validation_id == null && (Auth::user()->id == $tutoriel->user->id || Auth::user()->type_utilisateur->terme == "admin")): ?>
					<a href="<?php echo e(route('section.create', [$chapitre->id])); ?>"><img src="<?php echo e(asset('icon/add.svg')); ?>" class="btn-crud-sm"/></a>
					<a href="<?php echo e(route('chapitre.edit', [$chapitre->id])); ?>"><img src="<?php echo e(asset('icon/edit.svg')); ?>" class="btn-crud-sm"/></a>
					<?php echo Form::open(['method' => 'DELETE', 'route' => ['chapitre.destroy', $chapitre->id], 'style'=> 'display: inline-block']); ?>

						<img id="btn-del-chap"
							 src="<?php echo e(asset('icon/del.svg')); ?>"
							 class="btn-crud-sm"
							 onclick="if(confirm('Voulez-vous vraiment supprimé cette chapitre?')) submit()"/>
					<?php echo Form::close(); ?>

				<?php endif; ?>
			</h4>
			<div class="contenu">
				<?php echo $chapitre->description; ?>

				<?php foreach($chapitre->sections as $section): ?>
					<br/>
					<h6>
						<a id="<?= str_replace(' ', "_",$section->titre)?>" class="ancre"></a><?php echo e($section->titre); ?>

						<?php if(!Auth::guest() && $tutoriel->validation_id == null && (Auth::user()->id == $tutoriel->user->id || Auth::user()->type_utilisateur->terme == "admin")): ?>
							<a href="<?php echo e(route('section.edit', [$section->id])); ?>"><img src="<?php echo e(asset('icon/edit.svg')); ?>" class="btn-crud-sm"/></a>
							<?php echo Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'route' => ['section.destroy', $section->id]]); ?>

								<img id="btn-del-chap"
									 src="<?php echo e(asset('icon/del.svg')); ?>"
									 class="btn-crud-sm"
									 onclick="if(confirm('Voulez-vous vraiment supprimé cette section?')) submit()"/>
							<?php echo Form::close(); ?>

						<?php endif; ?>
					</h6>
					<?php echo $section->contenu; ?>

				<?php endforeach; ?>
			</div>

			<?php ($numero_chapitre++); ?>
		<?php endforeach; ?>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
	<ul>
		<li>
			<a href="#intro">INTRODUCTION</a>
		</li>
		<?php foreach($tutoriel->chapitres as $chapitre): ?>
			<li>
				<a href="#<?= str_replace(' ', "_",$chapitre->nom)?>"><?php echo e($chapitre->nom); ?></a>
				<ul>
					<?php foreach($chapitre->sections as $section): ?>
						<li><a href="#<?= str_replace(' ', "_",$section->titre)?>"><?php echo e($section->titre); ?></a> </li>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
	</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
	<div class="modal" id="modal-del-tuto">
		<div class="modal-panel">
			<div class="modal-header">Comfirmation</div>
			<div class="modal-content">Voulez-vous vraiment supprimés ce tutoriel?</div>
			<div class="modal-footer">
				<?php echo Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'route' => ['tutoriel.destroy', $tutoriel->id]]); ?>

				<input class="modal-btn-primary" type="submit" value="Oui">
				<input class="modal-btn modal-close" type="button" value="Non"/>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<?php echo e(Html::script('js/modal.js')); ?>

	<script>
        $(function () {
            $('#btn-del-tuto').click(function () {
                $('#modal-del-tuto').toggle()
            });
            $('.modal-close').click(function () {
                $('#modal-del-tuto').hide()
            })
        })
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>