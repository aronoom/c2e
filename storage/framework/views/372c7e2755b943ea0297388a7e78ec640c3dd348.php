<div class="banniere">
    <div class="bg-degrade">
    </div>
    <div class="slogan">
        <h1>Les tutoriels</h1>
        <h5>faits par des étudiants,<br/> pour des étudiants,<br/> maintenus par des étudiants</h5>
        <?php if(Auth::guest()): ?>
            <div class="center ">
                <a href="<?php echo e(url('/user/create')); ?>" class="btn-connect">
                    <span class="label-connect">S' INSCRIRE</span>
                    <span class="bg-fleche"><span class="icon-fleche"></span></span>
                </a>
            </div>
        <?php endif; ?>
</div>
</div>