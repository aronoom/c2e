

<?php $__env->startSection('contenu'); ?>
    <?php if(!Auth::guest() && Auth::user()->id == $tutoriel->user_id): ?>
<div class="row">
		    <div class="justify-content-md-center col-sm-12">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création d'un Tutoriel</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							<?php echo Form::Model($tutoriel,['route' => ['tutoriel.update',$tutoriel->id], 'method' => 'put', 'class' => 'form-horizontal panel']); ?>	
							<div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
								<?php echo Form::label('nom','Nom du tutoriel'); ?>

							  	<?php echo Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom du tutoriel']); ?>

							  	<?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('niveau_id') ? 'has-error' : ''; ?>">
								<?php echo Form::label('niveau_id','niveau du tutoriel'); ?>

							  	<?php echo Form::select('niveau_id',$niveaus,$tutoriel->niveau_id, ['class' => 'form-control', 'placeholder' => '']); ?>

							  	<?php echo $errors->first('niveau_id', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
								<?php echo Form::label('description','Description'); ?>

							  	<?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '....................']); ?>

							  	<?php echo $errors->first('description', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('introduction') ? 'has-error' : ''; ?>">
								<?php echo Form::label('introduction','Introduction du tutoriel'); ?>

							  	<?php echo Form::textarea('introduction', null, ['class' => 'form-control', 'placeholder' => '....................']); ?>

							  	<?php echo $errors->first('introduction', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('telephone') ? 'has-error' : ''; ?>">
								<?php echo Form::label('image_fichier','Image du tutoriel'); ?>

							  	<?php echo Form::file('image_fichier', null, ['class' => 'form-control']); ?>

							  	<?php echo $errors->first('telephone', '<small class="help-block">:message</small>'); ?>

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
       <?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
       <?php $__env->stopSection(); ?>
   <?php else: ?>
    Erreur car ce tutoriel vous appartient pas :)
   <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>