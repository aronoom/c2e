<?php $__env->startSection('title'); ?>
	Ajouter un chapitre
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style("css/form.css")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <?php if(!Auth::guest() && Auth::user()->id == $tutoriel->user_id): ?>
    	<?php if(session()->has('ok')): ?>
			<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
		<?php endif; ?>
		<?php /*<b>Nom</b>
	   <div class="row"><?php echo $tutoriel->nom; ?></div>
	   <b>Description</b>
	   <div class="row"><?php echo $tutoriel->description; ?></div>
		<b>Liste des chapitres</b>
		<?php ($numero_chapitre = 1); ?>
		<?php foreach($tutoriel->chapitres as $chapitre): ?>
			<div class="row"><b>chapitre <?php echo e($numero_chapitre); ?></b> :<b><?php echo $chapitre->nom; ?></b>
							<?php echo link_to_route('chapitre.edit_chapitre', 'Continuer l\'écriture du chapitre', [$chapitre->id], ['class' => '']); ?>

			</div>
			
			<?php ($numero_chapitre++); ?> 
		<?php endforeach; ?>*/ ?>
		<h3>Ajout d'un chapitre</h3>
		<?php echo $__env->make('chapitre.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
	<?php $__env->stopSection(); ?>
    <?php else: ?>
        Erreur car ce tutoriel vous appartient pas :)
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script>
		<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>