<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo e(Html::style('css/base.css')); ?>

    <?php echo e(Html::style('css/entete.css')); ?>

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
	<?php echo $__env->make('menu.top_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent("contenu"); ?>
</body>
	<?php echo $__env->make('jsBase.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('javascript'); ?>
</html>