

<?php $__env->startSection('contenu'); ?>
<div class="row justify-content-md-center">
		    <div class="col-sm-4">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création d'un Catégorie</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							<?php echo Form::open(['url' => 'niveau', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>	
							<div class="form-group <?php echo $errors->has('niveau') ? 'has-error' : ''; ?>">
								<?php echo Form::label('niveau','niveau du niveau'); ?>

							  	<?php echo Form::text('niveau', null, ['class' => 'form-control', 'placeholder' => 'niveau']); ?>

							  	<?php echo $errors->first('niveau', '<small class="help-block">:message</small>'); ?>

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