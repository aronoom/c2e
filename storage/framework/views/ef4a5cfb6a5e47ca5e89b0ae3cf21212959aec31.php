<ul>
    <?php if(!$annonces->isEmpty()): ?>
        <li>
            <a href="#annonce">ANNONCES RECENTES</a>
            <ul>
                <?php foreach($annonces as $annonce): ?>
                    <li><a href="#"><?php echo e($annonce->titre); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endif; ?>

    <?php if(!$tutoriels->isEmpty()): ?>
        <li>
            <a href="#tuto">TUTORIELS RECENTS</a>
            <ul>
                <?php foreach($tutoriels as $tutoriel): ?>
                    <li><?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => ''])); ?></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endif; ?>

    <?php if(!$users->isEmpty()): ?>
        <li>
            <a href="#membre">MEMBRES ACTIFS</a>
            <ul>
                <?php foreach($users as $user): ?>
                    <li><?php echo link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']); ?><br/></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endif; ?>
</ul>