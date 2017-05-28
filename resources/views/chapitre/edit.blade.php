@extends('base')

@section('title')
	Modification d'un chapitre
@endsection

@section('style')
	{{ Html::style('css/form.css') }}
@endsection

@section('contenu')
	<div class="container">
		<h3>Modification du chapitre</h3>
		{!! Form::open(['url' => 'chapitre', 'put' => 'post', 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('Titre') !!}
			{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Titre du chapitre']) !!}
			{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
			<div class="content-input">
				{!! Form::label('Contenu') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control textarea', 'placeholder' => 'description du chapitre']) !!}
				{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
			</div>
		</div>
		<div class="content-btn">
			{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	@section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
	@endsection

@stop