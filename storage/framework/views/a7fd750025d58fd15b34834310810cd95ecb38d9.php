
<?php $__env->startSection('title'); ?>
Forum
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
<div class="row">
    <div class="col-sm-12">
    	<?php if(session()->has('ok')): ?>
			<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
		<?php endif; ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Forum</h3>
			</div>
			
					<?php foreach($forums as $forum): ?>
							
                            <div class="row">

                            	<?php echo $forum->sujet; ?>

                            </div>
                            <div class="row">
                            	<div class="col-9"><?php echo $forum->description; ?></div>
                            </div>
							<?php echo link_to_route('forum.show', 'Voir', [$forum->id], ['class' => '']); ?></td>
							<?php echo link_to_route('forum.edit', 'Modifier', [$forum->id], ['class' => '']); ?></td>
								<?php echo Form::open(['method' => 'DELETE', 'route' => ['forum.destroy', $forum->id]]); ?>

									<?php echo Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']); ?>

								<?php echo Form::close(); ?>

					<?php endforeach; ?>
	  		
		</div>
		<?php echo link_to_route('forum.create', 'Créer un nouveau Forum', [], ['class' => 'btn btn-info pull-right']); ?>

		<?php echo $links; ?>

	</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>