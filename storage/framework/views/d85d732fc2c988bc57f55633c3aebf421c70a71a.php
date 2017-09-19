<?php $__env->startSection('title'); ?>
    Authentification
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('css/form.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <?php if(session()->has('ok')): ?>
        <div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
    <?php endif; ?>

    <h3>Authentification</h3>
    <form class="form-auth" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="email" class="col-md-4 control-label">E-Mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" placeholder="rakoto@gmail.com" name="email" value="<?php echo e(old('email')); ?>">

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                    <small><?php echo e($errors->first('email')); ?></small>
                </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <label for="password" class="col-md-4 control-label">Mots de passe</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                    <small><?php echo e($errors->first('password')); ?></small>
                </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="content-btn">
            <button type="submit" class="btn btn-primary btn-fixed pull-right"> Connecter </button>
        </div>

        <div class="form-group">
            <a class="link" href="<?php echo e(url('/password/reset')); ?>">Mot de passe oublié?</a><br/>
            <input type="checkbox" style="display: inline; width: 40px" name="remember"> Se souvenir de moi<br/>
        </div>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>