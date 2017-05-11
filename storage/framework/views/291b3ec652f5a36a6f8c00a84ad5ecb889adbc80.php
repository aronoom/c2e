

<?php $__env->startSection('contenu'); ?>
<div class="row justify-content-md-center">
		    <div class="col-sm-4">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création d'un Catégorie</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							<?php echo Form::open(['url' => 'type', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>	
							<div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
								<?php echo Form::label('nom','Nom du catégorie'); ?>

							  	<?php echo Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']); ?>

							  	<?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
								<?php echo Form::label('description','Quelle est votre motif d\'inscription ?'); ?>

							  	<?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Mon motif d\'inscription .......']); ?>

							  	<?php echo $errors->first('description', '<small class="help-block">:message</small>'); ?>

							</div>

							<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']); ?>

							<?php echo Form::close(); ?>

						</div>
					</div>
				</div>
				<a href="javascript:history.back()" class="btn btn-primary">
					<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
				</a>
			</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>