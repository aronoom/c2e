<?php $__env->startSection('contenu'); ?>

    <br>

    <div class="col-sm-offset-4 col-sm-4">

        <div class="panel panel-danger">

            <div class="panel-heading">

                <h3 class="panel-title">Il y a un problème !</h3>

            </div>

            <div class="panel-body"> 

                <p>Nous sommes désolés mais la page que vous désirez n'existe pas...</p>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>