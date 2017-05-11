<?php /* extends('layouts.app')  */ ?>


<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('css/banniere.css')); ?>

    <?php echo e(Html::style('css/navigation.css')); ?>

    <?php echo e(Html::style('css/membre.css')); ?>

    <?php echo e(Html::style('css/tutoriel.css')); ?>

    <?php echo e(Html::style('css/accueil.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <?php echo $__env->make('accueil.banniere', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">
         <?php /*    <?php if(!Auth::guest()): ?>
                <img width="100" height="100" class="img-responsive rounded-circle" src="<?php echo Auth::user()->image; ?>" alt="">
            <?php endif; ?> */ ?>
        <?php /*<div class="row">
            Forum
            <div class="row">
                <ul>
                <?php foreach($forums as $forum): ?>
                    <li>
                        <ul>
                            <li><?php echo e($forum->sujet); ?></li>
                            <li><?php echo e($forum->user->name); ?></li>
                            <li><?php echo e($forum->created_at); ?></li>
                            <li>
                        <?php echo link_to_route('forum.show', 'Voir', [$forum->id], ['class' => '']); ?>

                            </li>
                        </ul>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        */ ?>


        <div class="article">
            <div class="section" style="height:300px">
                <h3><a href="#annonce" class="ancre" id="annonce">#</a> Annonce récente</h3>
                <div class="section-content">
                </div>
            </div>


            <div class="section">
                <h3><a href="#tuto" class="ancre" id="tuto">#</a> Tutoriel récent</h3>
                <?php foreach($tutoriels as $tutoriel): ?>
                    <div class="section-tuto-content">
                        <div class="panel-tuto">
                            <img class="img-tuto" src="<?php echo asset('image/tuto/c.png'); ?>" alt="">
                            <div class="container-tuto-info">
                                <h4>
                                    <img class="img-tuto-mini" src="<?php echo asset('image/badge/php.png'); ?>"/>
                                    <?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto'])); ?>

                                </h4>
                                <p class="tuto-description">
                                    <?php echo substr($tutoriel->description, 0,200); ?> <?php echo e(strlen($tutoriel->description) > 200? ".....":" "); ?>

                                </p>
                                <div>
                                    <span class="auteur-tuto"><span class="nom-auteur"> RAMANITRA Aro Nomeniaina</span>,</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a href="#" class="link-tous">Tous les tutoriels</a>
            </div>


            <div class="section">
                <h3><a href="#membre" class="ancre" id="membre">#</a> Membre actif</h3>
                <?php foreach($user_stars as $user): ?>
                    <div class="section-membre-content">
                        <div class="panel-membre">
                            <img class="img-membre" src="<?php echo e($user->image); ?>" alt="">
                            <div class="container-membre-info">
                                <span class="label-nom"><?php echo e($user->name); ?></span><br/>
                                <span class="label-nom">Kotozafy</span><br/>
                                <span class="label-domaine">Génie logiciel et Base de Donnée</span>
                                <div class="list-badge">
                                    <img src="<?php echo asset('image/badge/php.png'); ?>" alt="php">
                                    <img src="<?php echo asset('image/badge/qt.png'); ?>" alt="Qt">
                                </div>
                            </div>
                        </div>
                        <div class="panel-link-membre">
                            <?php echo link_to_route('user.show', 'Plus de détail', [$user->id], ['class' => 'link-detail-membre']); ?>

                        </div>
                    </div>
                <?php endforeach; ?>
                <a href="#" class="link-tous">Tous les membres</a>
            </div>
        </div>
        <div class="navigation">
            <?php echo $__env->make('accueil.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>