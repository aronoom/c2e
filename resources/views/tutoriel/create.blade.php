@extends('base')
{{ Html::style('css/form.css')}}

@section('contenu')
	<div class="container">
		<h3>Création du tutoriel</h3>

		{!! Form::open(['url' => 'tutoriel', 'method' => 'post','files' => true, 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
				{!! Form::label('nom','Nom du tutoriel') !!}
				{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom du tutoriel']) !!}
				{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('Types[]') ? 'has-error' : '' !!}">
				{!! Form::label('Types[]','Type du tutoriel') !!}
				{!! Form::select('Types[]',App\Type::lists('nom','id'),null, ['class' => 'form-control', 'placeholder' => '','multiple'=>true]) !!}
				{!! $errors->first('Types[]', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('niveau_id') ? 'has-error' : '' !!}">
				{!! Form::label('niveau_id','Niveau du tutoriel') !!}
				{!! Form::select('niveau_id',$niveaus,null, ['class' => 'form-control', 'placeholder' => '']) !!}
				{!! $errors->first('niveau_id', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
				{!! Form::label('description','Description du tutoriel') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '....................']) !!}
				{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('introduction') ? 'has-error' : '' !!}">
				<div class="content-input">
					{!! Form::label('introduction','Introduction du tutoriel') !!}
					{!! Form::textarea('introduction', null, ['class' => 'form-control textarea', 'placeholder' => '....................']) !!}
					{!! $errors->first('introduction', '<small class="help-block">:message</small>') !!}
				</div>
			</div>

			<div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
				{!! Form::label('image_fichier','Image du tutoriel') !!}
				{!! Form::file('image_fichier', null, ['class' => 'form-control']) !!}
				{!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
			</div>

			<div class="content-input">
				<div class="pull-right">
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
					<a href="javascript:history.back()" class="btn">
						Retour
					</a>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
	@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
	@endsection
@stop
