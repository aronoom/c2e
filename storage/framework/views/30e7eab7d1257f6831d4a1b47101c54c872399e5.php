
<?php $__env->startSection('title'); ?>
Gestion Tutoriel
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
    <br>
    <div class="col-sm-12">
    	<?php if(session()->has('ok')): ?>
			<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
		<?php endif; ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des Tutoriels</h3>
			</div>
					<?php foreach($tutoriels as $tutoriel): ?>
						<?php echo $tutoriel->id; ?>

							<?php echo $tutoriel->nom; ?>

							<img src="<?php echo $tutoriel->image; ?>" class="img-fluid col-10" alt="">
						<div class="description">	
							<?php echo $tutoriel->description; ?>

							<?php echo link_to_route('tutoriel.show', 'Voir', [$tutoriel->id], ['class' => '']); ?>

                 
                                                        <?php if(!Auth::guest() && Auth::user()->id == $tutoriel->user_id): ?>
                                                            <?php echo link_to_route('tutoriel.edit', 'Modifier les Informations du tutoriel', [$tutoriel->id], ['class' => '']); ?>

                                                            <?php echo link_to_route('tutoriel.edit_tutoriel', 'Continuer l\'écriture du  tutoriel', [$tutoriel->id], ['class' => '']); ?>

                                                        <?php endif; ?>
								<?php echo Form::open(['method' => 'DELETE', 'route' => ['tutoriel.destroy', $tutoriel->id]]); ?>

									<?php echo Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']); ?>

								<?php echo Form::close(); ?>

						</div>
					<?php endforeach; ?>
	  			
		</div>
		<?php echo link_to_route('tutoriel.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']); ?>

		<?php echo $links; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>