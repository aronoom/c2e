<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>c2e | <?php echo $__env->yieldContent('title'); ?></title>
    <?php echo e(Html::style('css/base.css')); ?>

    <?php echo e(Html::style('css/entete.css')); ?>

    <?php echo e(Html::style('css/form.css')); ?>

    <?php echo e(Html::style('css/membre.css')); ?>

    <?php echo e(Html::style('css/tutoriel.css')); ?>

    <?php echo e(Html::style('css/navigation.css')); ?>

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
    <header>
        <?php echo $__env->make('menu.top_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent("banniere"); ?>
    </header>
    <div class="container">
        <div class="article">
            <?php echo $__env->yieldContent("contenu"); ?>
        </div>
        <div class="navigation">
            <?php echo $__env->yieldContent("navigation"); ?>
        </div>
    </div>
    <?php /*<footer class="footer">
        <?php echo $__env->yieldContent("footer"); ?>
    <footer>*/ ?>
    <?php echo $__env->yieldContent('modal'); ?>
</body>
	<?php echo $__env->make('jsBase.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('javascript'); ?>
</html>