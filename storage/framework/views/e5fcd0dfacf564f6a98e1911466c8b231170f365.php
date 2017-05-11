
<?php $__env->startSection('title'); ?>
Gestion Utilisateur
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	<?php if(session()->has('ok')): ?>
			<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
		<?php endif; ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des utilisateurs</h3>
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
					<?php foreach($users as $user): ?>
						<tr>
							<td><?php echo $user->id; ?></td>
							<td class="text-primary"><strong><?php echo $user->name; ?></strong></td>
							<td><?php echo link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']); ?></td>
							<td><?php echo link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']); ?></td>
							<td>
								<?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]); ?>

									<?php echo Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']); ?>

								<?php echo Form::close(); ?>

							</td>
						</tr>
					<?php endforeach; ?>
	  			</tbody>
			</table>
		</div>
		<?php echo link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']); ?>

		<?php echo $links; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>