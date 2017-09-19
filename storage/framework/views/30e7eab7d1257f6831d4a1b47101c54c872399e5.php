<?php $__env->startSection('title'); ?> Tutoriels <?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<?php echo e(Html::style('css/tutoriel.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('banniere'); ?>
	<div class="container">
		<div class="tuto-banniere">
		<pre class=" language-c"><code class="language-c hljs cpp"><span class="token function"><span class="hljs-built_in">printf</span></span><span class="token punctuation">(</span><span class="token string"><span class="hljs-string">"Hello world!"</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true"><span class="hljs-comment">//La rédaction d'un tutoriel permet d'avoir un badge</span></span></code></pre>
			<center>
				<?php echo link_to_route('tutoriel.create', 'Rédiger un tutoriel', [], ['class' => 'tuto-btn ']); ?>

			</center>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
	<?php if(session()->has('ok')): ?>
		<div class="alert-success"><?php echo session('ok'); ?></div>
	<?php endif; ?>

	<h3>
		<a href="#aprecies" class="ancre" id="tuto"></a>Tutoriels
	</h3>
	<?php foreach($tutoriels as $tutoriel): ?>
		<div class="panel-tuto">
			<img class="img-tuto" src='<?php echo asset($tutoriel->badget->image); ?>'/>
			<div class="container-tuto-info">
				<div class="tuto-description">
					<a href="<?php echo e(route('tutoriel.show', [$tutoriel->id])); ?>">
						<p  class="paragraphe"> <?php echo e($tutoriel->description); ?> </p>
					</a>
					<?php /* <?php echo e(link_to_route('tutoriel.show', $tutoriel->description, [$tutoriel->id])); ?> */ ?>
				</div>
				<div class="tuto-titre">
					<?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto'])); ?><br/>
					<span class="nom-auteur"> Par <?php echo e($tutoriel->user->name. ' ' .$tutoriel->user->prenom); ?>,</span>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<?php echo $tutoriels->links(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
	<ul>
		<li>
			<a href="#aprecies">TUTORIELS</a>
			<ul>
				<?php foreach($tutoriels as $tutoriel): ?>
					<li><?php echo e(link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => ''])); ?></li>
				<?php endforeach; ?>
			</ul>
		</li>
	</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>