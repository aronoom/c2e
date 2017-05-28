@extends('base')

@section('style')
	{{Html::style('css/form.css')}}
@endsection

@section('title')
	Modification du tutoriel
@endsection

@section('contenu')
    @if (!Auth::guest() && Auth::user()->id == $tutoriel->user_id)
	<div class="container">
		<h3>Modification du tutoriel</h3>
		<div>
			{!! Form::Model($tutoriel,['route' => ['tutoriel.update',$tutoriel->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
				{!! Form::label('nom','Nom') !!}
				{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom du tutoriel']) !!}
				{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('niveau_id') ? 'has-error' : '' !!}">
				{!! Form::label('niveau_id','Niveau') !!}
				{!! Form::select('niveau_id',$niveaus,$tutoriel->niveau_id, ['class' => 'form-control', 'placeholder' => '']) !!}
				{!! $errors->first('niveau_id', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
				{!! Form::label('description','Description') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('introduction') ? 'has-error' : '' !!}">
				<div class="content-input">
					{!! Form::label('introduction','Introduction du tutoriel') !!}
					{!! Form::textarea('introduction', null, ['class' => 'form-control textarea']) !!}
					{!! $errors->first('introduction', '<small class="help-block">:message</small>') !!}
				</div>
			</div>
			<div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
				{!! Form::label('image_fichier','Image du tutoriel') !!}
				{!! Form::file('image_fichier', null, ['class' => 'form-control']) !!}
				{!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
			</div>


			<div class="content-btn">
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary btn-fixed pull-right']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
   @else
    Erreur car ce tutoriel vous appartient pas :)
   @endif

	@section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
	@endsection
@stop