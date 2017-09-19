<?php $__env->startSection('title'); ?>
Discussion
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style('css/forum.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('banniere'); ?>
	<div class="container">
		<div class="tuto-banniere">
		<pre class=" language-c"><code class="language-c hljs cpp"><span class="token comment" spellcheck="true"><span class="hljs-comment">//Des questions ou remarques?</span></span></code></pre>
			<center>
				<?php echo link_to_route('forum.create', 'Lancer une discussion', [], ['class' => 'tuto-btn']); ?>

			</center>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<?php if(session()->has('ok')): ?>
		<div class="alert alert-success alert-dismissible"><?php echo session('ok'); ?></div>
	<?php endif; ?>

	<h3 class="panel-title">Discussions</h3>

	<?php foreach($forums as $forum): ?>
		<div class="disc-section">
			<h6><?php echo link_to_route('forum.show', $forum->sujet, [$forum->id], ['class' => 'link']); ?></h6>
			<div class="disc-auteur">
				<img class="disc-auteur-photo" src="../<?php echo $forum->user->image; ?>" alt="">
				<span class="disc-auteur-nom"><?php echo e($forum->user->name." ".$forum->user->prenom); ?>, le <?php echo e(date_format($forum->created_at, 'd/m/y')); ?></span>
			</div>
			<div class="disc-description"><?php echo $forum->description; ?></div>
		</div>
	<?php endforeach; ?>

	<?php echo $forums->links(); ?>

	<?php $__env->startSection('javascript'); ?>
		<script>
			<?php echo $__env->make('tinyMCE.config_all_of_tinyMCE', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</script>
	<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
	<ul>
		<li>
			<a href="#aprecies">DISCUSSIONS</a>
			<ul>
				<?php foreach($forums as $forum): ?>
					<li><?php echo link_to_route('forum.show', $forum->sujet, [$forum->id]); ?></li>
				<?php endforeach; ?>
			</ul>
		</li>
	</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>