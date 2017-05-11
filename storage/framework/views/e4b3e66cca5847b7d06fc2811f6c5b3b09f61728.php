
<?php $__env->startSection('title'); ?>
Gestion Catégorie
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	<?php if(session()->has('ok')): ?>
			<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
		<?php endif; ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des Catégories</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($types as $type): ?>

						<tr>
							<td><?php echo $type->id; ?></td>
							<td class="text-primary"><strong><?php echo $type->nom; ?></strong></td>
							<td><?php echo link_to_route('type.show', 'Voir', [$type->id], ['class' => 'btn btn-success btn-block']); ?></td>
							<td><?php echo link_to_route('type.edit', 'Modifier', [$type->id], ['class' => 'btn btn-warning btn-block']); ?></td>
							<td>
								<?php echo Form::open(['method' => 'DELETE', 'route' => ['type.destroy', $type->id]]); ?>

									<?php echo Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet Catégorie ?\')']); ?>

								<?php echo Form::close(); ?>

							</td>
						</tr>
					<?php endforeach; ?>
	  			</tbody>
			</table>
		</div>
		<?php echo link_to_route('type.create', 'Ajouter un Catégorie', [], ['class' => 'btn btn-info pull-right']); ?>

		<?php echo $links; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>