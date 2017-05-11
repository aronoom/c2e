@extends('base')

@section('style')
{{ Html::style('css/form.css')}}
@stop

@section('contenu')
	<div class="container">
		<h3>Inscription</h3>

		{!! Form::open(['url' => 'user', 'method' => 'post','files'=>true, 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
			{!! Form::label('name','Nom') !!}
			{!! Form::text('name', null, ['class' => 'form', 'placeholder' => 'Dupont']) !!}
			{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
			{!! Form::label('prenom','Prénom') !!}
			{!! Form::text('prenom', null, ['class' => 'form', 'placeholder' => 'Jean']) !!}
			{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
		</div>


		<div class="form-group {!! $errors->has('image_fichier') ? 'has-error' : '' !!}">
			{!! Form::label('image_fichier','Photo de votre avatar') !!}
			{!! Form::file('image_fichier', null, ['class' => 'form-control', 'placeholder' => 'image_fichier']) !!}
			{!! $errors->first('image_fichier', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('login') ? 'has-error' : '' !!}">
			{!! Form::label('login','Login') !!}
			{!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'jeanrak']) !!}
			{!! $errors->first('login', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
			{!! Form::label('telephone','Numéro de téléphone') !!}
			{!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '+261']) !!}
			{!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
			{!! Form::label('adresse','Adresse postale') !!}
			{!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Antananarivo 67ha Lot ....']) !!}
			{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('Motif_insrciption') ? 'has-error' : '' !!}">
			{!! Form::label('Motif_insrciption','Quelle est votre motif d\'inscription ?') !!}
			{!! Form::textarea('Motif_insrciption', null, ['class' => 'form-control textarea', 'placeholder' => 'Mon motif d\'inscription .......']) !!}
			{!! $errors->first('Motif_insrciption', '<small class="help-block">:message</small>') !!}
		</div>

		<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
			{!! Form::label('email','Adresse E-Mail') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'c2e@gmail.com']) !!}
			{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
		</div>

		<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
			{!! Form::label('password','Mots de passe') !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
			{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group">
			{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
		</div>
		<div class="content-btn ">
			<div class="pull-right">
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
				<a href="javascript:history.back()" class="btn ">
					<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
				</a>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@stop

@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
@endsection