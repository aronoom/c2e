	<?php echo Form::open(['url' => 'chapitre', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>	
							<div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
							  	<?php echo Form::text('nom', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Nom du chapitre']); ?>

							  	<?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

							</div>
							<div class="form-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
							  	<?php echo Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'description du chapitre']); ?>

							  	<?php echo $errors->first('description', '<small class="help-block">:message</small>'); ?>

							</div>
							<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']); ?>

							<?php echo Form::close(); ?>