<?php $__env->startSection('title'); ?> Membres <?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('css/membre.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <?php if(session()->has('ok')): ?>
        <div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
    <?php endif; ?>

    <div class="section">
        <h3>
            Membres
            <?php /*<?php echo link_to_route('user.create', 'Creer un utilisateur', [], ['class' => 'btn btn-primary pull-right']); ?>*/ ?>
        </h3>
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
    </div>
    <?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
    <ul>
        <li>
            <a href="#aprecies">MEMBRES</a>
            <ul>
                <?php foreach($users as $user): ?>
                    <li><?php echo link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']); ?><br/></li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>