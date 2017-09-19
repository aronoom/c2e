<div class="bar menu ">
    <div class="container">
        <img class="pull-left img-logo" src="<?php echo asset('image/entete/logo.png'); ?>">
        <div class="pull-right">
            <ul class="menu-list menu-max">
                <li><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
                <li><a href="<?php echo e(route('annonce.index')); ?>">Annonce</a></li>
                <li><a href="<?php echo e(route('tutoriel.index')); ?>">Tutoriel</a></li>
                <li><a href="<?php echo e(route('user.index')); ?>">Membre</a></li>
                <li><a href="<?php echo e(route('forum.index')); ?>">Discussion</a></li>
                <li><a href="#">A propos</a></li>
                <?php if(!Auth::guest() && Auth::user()->type_utilisateur->terme == "admin"): ?>
                    <li><a href="<?php echo e(route('badget.index')); ?>">Badge</a></li>
                <?php endif; ?>
                <?php if(!Auth::guest() && (Auth::user()->type_utilisateur->terme == "validateur" || Auth::user()->type_utilisateur->terme == "admin")): ?>
                    <li><a href="<?php echo e(route('tutoriel.list_validation')); ?>">Validation</a></li>
                <?php endif; ?>
            </ul>
            <div class="menu-user">
                <?php if(Auth::guest()): ?>
                    <img class="img-user" src=" <?php echo asset('icon/login.svg'); ?>">
                    <ul class="list-menu-guest">
                        <li><a href=" <?php echo e(url('/login')); ?>" class="link-dark"> Se connecter</a></li>
                    </ul>
                <?php else: ?>
                    <img class="img-user" src="<?php echo asset(Auth::user()->image); ?>">
                    <ul class="list-menu-guest">
                        <li><a href="<?php echo e(route('user.show', [Auth::user()->id])); ?>" class="link-dark">Profil</a></li>
                        <li><a href="<?php echo e(url('/logout')); ?>" class="link-dark"> Se déconnecter</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="menu-min">
                <img class="menu-icon" src="<?php echo e(asset('icon/menu.svg')); ?>"/>
                <ul class="list-menu-link">
                    <li></li>
                    <li><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
                    <li><a href="<?php echo e(route('annonce.index')); ?>">Annonce</a></li>
                    <li><a href="<?php echo e(route('tutoriel.index')); ?>">Tutoriel</a></li>
                    <li><a href="<?php echo e(route('user.index')); ?>">Membre</a></li>
                    <li><a href="<?php echo e(route('forum.index')); ?>">Discussion</a></li>
                    <li><a href="#">A propos</a></li>
                    <?php if(!Auth::guest() && Auth::user()->type_utilisateur->terme == "admin"): ?>
                        <li><a href="<?php echo e(route('badget.index')); ?>">Badge</a></li>
                    <?php endif; ?>
                    <?php if(!Auth::guest() && (Auth::user()->type_utilisateur->terme == "validateur" || Auth::user()->type_utilisateur->terme == "admin")): ?>
                        <li><a href="<?php echo e(route('tutoriel.list_validation')); ?>">Validation</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bar def">
    <div class="container">
        <span class="def-logo">Club d'Entraide des Etudiants</span>
    </div>
</div>
<div class="bar recherche">
    <div class="container">
        <div class="pull-left">
            <span class="def-logo-recherche">Club d'Entraide des Etudiants</span>
        </div>
        <div>
            <?php echo Form::open(['route' => ['home.search'], 'method' => 'get']); ?>

                <input class="input-search" type="text" id="test" name="data" value="<?php echo e(Request::get('data')); ?>"/>
                <img class="img-loupe" src="<?php echo asset('image/entete/loupe.png'); ?>" onclick="submit()"/>
            <?php echo Form::close(); ?>

        </div>
    </div>

</div>
<?php echo e(Html::script('js/jquery-3.1.1.min.js')); ?>

<?php echo e(Html::script('js/animation.js')); ?>