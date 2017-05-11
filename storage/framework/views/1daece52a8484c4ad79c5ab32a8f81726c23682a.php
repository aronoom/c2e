<div class="bar menu ">
    <div class="container">
        <img class="pull-left img-logo" src="<?php echo asset('image/entete/logo.png'); ?>">
        <div class="pull-right">
            <ul class="menu-list menu-max">
                <li><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
                <li><a href="#">Annonce</a></li>
                <li><a href="<?php echo e(route('tutoriel.index')); ?>">Tutoriel</a></li>
                <li><a href="<?php echo e(route('user.index')); ?>">Membre</a></li>
                <li><a href="<?php echo e(route('forum.index')); ?>">Discussion</a></li>
                <li><img class="img-user" src="<?php echo asset('image/entete/user.png'); ?>"></li>
            </ul>
            <ul class="menu-list menu-min">
                <li><img class="img-user" src="<?php echo asset('image/entete/user.png'); ?>"></li>
                <li><img class="menu-icon" src="<?php echo asset('image/entete/menu.ico.png'); ?>"/></li>
            </ul>
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
        <div class="pull-right">
            <div class="content-search-bar">
                <input class="input-search" type="text" id="test"/>
                <img class="img-loupe" src="<?php echo asset('image/entete/loupe.png'); ?>"/>
            </div>
        </div>
    </div>

</div>

<?php /*<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse mb-4 navbar-fixed-top" style="box-shadow: 0px 1px 5px rgba(0,0,0,.5);">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">C2e</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('forum.index')); ?>">Forum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('tutoriel.index')); ?>">Tutoriel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('exercice.index')); ?>">Exercice</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('projet.index')); ?>">Projet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('user.index')); ?>">Membre</a>
          </li>
                   <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/user/create')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <?php echo e(Auth::user()->name); ?>

                            </a>
                        </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/logout')); ?>">Logout</a></li>

                    <?php endif; ?>

        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    */ ?>