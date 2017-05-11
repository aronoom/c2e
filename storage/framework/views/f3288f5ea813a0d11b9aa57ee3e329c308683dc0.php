
<?php $__env->startSection('title'); ?>
Gestion Tutoriel
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	<div class="row justify-content-md-center">
    		<div class="col-4">
    			<img class="col-12" src="../<?php echo $tutoriel->user->image; ?>" alt="">
    	</div>
    	</div>
    <div class="row">Titre:<?php echo $tutoriel->nom; ?></div>
--------------------------------------------------------------------------------
    <div class="row tutoriel"><?php echo $tutoriel->introduction; ?></div>
	<div class="row tutoriel">
		<ul>
		<?php ($numero_section = 1); ?>
		<?php ($numero_chapitre = 1); ?>
		<?php foreach($tutoriel->chapitres as $chapitre): ?>
				<li style="display:block;"><?php echo link_to_route('chapitre.show',$numero_chapitre.$chapitre->nom, [$chapitre->id], ['class' => '']); ?></li>
				<ul>
						<?php foreach($chapitre->sections as $section): ?>
							<li><?php echo e($numero_section); ?>.<?php echo $section->titre; ?></li>
							<?php ($numero_section++); ?>
						<?php endforeach; ?>
				
				</ul>
				<?php ($numero_chapitre++); ?> 
		<?php endforeach; ?>
			</ul>
	</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>