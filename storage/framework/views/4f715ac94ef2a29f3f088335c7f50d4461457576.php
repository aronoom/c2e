<?php $__env->startSection('title'); ?>
    Accueil
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('css/banniere.css')); ?>

    <?php echo e(Html::style('css/annonce.css')); ?>

    <?php echo e(Html::style('css/membre.css')); ?>

    <?php echo e(Html::style('css/tutoriel.css')); ?>

    <?php echo e(Html::style('css/accueil.css')); ?>

    <?php echo e(Html::style('css/footer.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('banniere'); ?>
    <?php echo $__env->make('accueil.banniere', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <?php if(!$annonces->isEmpty()): ?>
    <div class="section">
        <h3><a href="#annonce" class="ancre" id="annonce">#</a> Annonces récentes</h3>

        <?php foreach($annonces as $annonce): ?>
            <div class="annonce-section">
                <div class="annonce-auteur">
                    <img id="<?= $annonce->id.'_'.str_replace(' ', '_', $annonce->titre)?>" class="annonce-auteur-photo"  src="<?php echo asset($annonce->user->image); ?>" alt="">
                    <span class="disc-auteur-nom"><?php echo e($annonce->user->name." ".$annonce->user->prenom); ?>, le <?php echo e(date_format($annonce->created_at, 'd/m/y')); ?></span>
                </div>
                <h6 class="annonce-titre"><?= strtoupper($annonce->titre)?></h6>
                <div class="disc-description"><?php echo $annonce->text; ?></div>
            </div>
        <?php endforeach; ?>

        <a href="<?php echo e(route('annonce.index')); ?>" class="link-tous">Tous les annonces</a>
    </div>
    <?php endif; ?>

    <?php if(!$tutoriels->isEmpty()): ?>
    <div class="section">

        <h3><a href="#tuto" class="ancre" id="tuto">#</a> Tutoriels récents</h3>
        <?php foreach($tutoriels as $tutoriel): ?>
            <div class="panel-tuto">
                <img class="img-tuto" src='<?php echo asset($tutoriel->badget->image); ?>'/>
                <div class="container-tuto-info">
                    <div class="tuto-description">
                        <a href="<?php echo e(route('tutoriel.show', [$tutoriel->id])); ?>">
                            <p  class="paragraphe"> <?php echo e($tutoriel->description); ?> </p>
                        </a>
                    </div>
                    <div class="tuto-titre">
                        <?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto'])); ?><br/>
                        <span class="nom-auteur"> Par <?php echo e($tutoriel->user->name. ' ' .$tutoriel->user->prenom); ?>,</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="<?php echo e(route('tutoriel.index')); ?>" class="link-tous">Tous les tutoriels</a>
    </div>
    <?php endif; ?>

    <?php if(!$users->isEmpty()): ?>
    <div class="section">
        <h3><a href="#membre" class="ancre" id="membre">#</a> Membres actifs</h3>
        <?php foreach($users as $user): ?>
            <div class="panel-membre">
                <img class="img-membre" src="<?php echo e(asset( $user->image)); ?>" alt="">
                <div class="info-membre">
                    <div class="info">
                        <?php echo link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => 'link']); ?><br/>
                        <span class="label-domaine"><?php echo e($user->domaine); ?></span><br/>
                        <?php foreach($user->tutoriels as $tutoriel): ?>
                            <img class="img-badge" src="<?php echo e(asset( $tutoriel->badget->image)); ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="<?php echo e(route('user.index')); ?>" class="link-tous">Tous les membres</a>
    </div>
    <?php endif; ?>

    <script>
        $(function () {
            var offsetPixels = 425;
            $(window).scroll(function () {
                if($(window).scrollTop() > offsetPixels){
                    $('.navigation').css({
                            'position': 'fixed',
                            'top': '45px',
                            'width': '18%'
                        }
                    )
                }else {
                    $('.navigation').css({
                        'position':'static',
                        'width':'24%'});
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("navigation"); ?>
    <?php echo $__env->make('accueil.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php /*
<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('accueil.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
*/ ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>