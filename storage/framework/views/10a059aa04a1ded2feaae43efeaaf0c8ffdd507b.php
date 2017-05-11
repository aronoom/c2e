
<?php $__env->startSection('title'); ?>
Niveau
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	<?php if(session()->has('ok')): ?>
			<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
		<?php endif; ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Niveau</h3>
			</div>
			
					<?php foreach($niveaus as $niveau): ?>
							
                            <div class="row">

                            	<?php echo $niveau->niveau; ?>

                            </div>
							<?php echo link_to_route('niveau.show', 'Voir', [$niveau->id], ['class' => '']); ?></td>
							<?php echo link_to_route('niveau.edit', 'Modifier', [$niveau->id], ['class' => '']); ?></td>
								<?php echo Form::open(['method' => 'DELETE', 'route' => ['niveau.destroy', $niveau->id]]); ?>

									<?php echo Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']); ?>

								<?php echo Form::close(); ?>

					<?php endforeach; ?>
	  		
		</div>
		<?php echo link_to_route('niveau.create', 'Créer un nouveau niveau', [], ['class' => 'btn btn-info pull-right']); ?>

		<?php echo $links; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>