@extends('base')

@section('style')
	{{ Html::style('css/form.css')}}
@stop

@section('contenu')
	<div class="container">
		<h3>Modification d'un badget</h3>

		{!! Form::open(['url' => 'badget', 'method' => 'post','files' => true, 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('nom','Nom') !!}
			{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
			{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
			{!! Form::label('description','Déscription du badget') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Déscription du badget .......']) !!}
			{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
		</div>

		<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
			{!! Form::label('image_fch','Joindre un Image') !!}
			{!! Form::file('image_fch', ['class' => 'form-control']) !!}
			{!! $errors->first('image_fch', '<small class="help-block">:message</small>') !!}
		</div>

		<div class="pull-right content-btn">
			{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
			<a href="javascript:history.back()" class="btn">
				Retour
			</a>
		</div>
		{!! Form::close() !!}
	</div>
@stop