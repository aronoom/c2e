

<?php $__env->startSection('contenu'); ?>
<div class="row justify-content-md-center">
		    <div class="col-sm-12">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création du Forum</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							<?php echo Form::open(['url' => 'forum', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>	
							<div class="form-group <?php echo $errors->has('sujet') ? 'has-error' : ''; ?>">
								<?php echo Form::label('sujet','Sujet'); ?>

							  	<?php echo Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Sujet du forum']); ?>

							  	<?php echo $errors->first('sujet', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('Type[]') ? 'has-error' : ''; ?>">
								<?php echo Form::label('Types[]','Catégorie'); ?>

							  	<?php echo Form::select('Types[]',App\Type::lists('nom','id'),null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Déscription du Forum','multiple'=>true]); ?>

							  	<?php echo $errors->first('Types[]', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
								<?php echo Form::label('description','Déscription du forum'); ?>

							  	<?php echo Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control textarea', 'placeholder' => 'Déscription du Forum']); ?>

							  	<?php echo $errors->first('description', '<small class="help-block">:message</small>'); ?>

							</div>
							
							<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']); ?>

							<?php echo Form::close(); ?>

						</div>
					</div>
				</div>
				<a class="row" href="javascript:history.back()" class="btn btn-primary">
					<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
				</a>
			</div>
	</div>
	<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
	<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>