@extends('base')

@section('contenu')
<div class="row justify-content-md-center">
		    <div class="col-sm-12">
		    	<br>
				<div class="panel panel-primary">
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création du tutoriel</div>
					<div class="panel-body">
						<div class="col-sm-12">
							{!! Form::open(['url' => 'tutoriel', 'method' => 'post','files' => true, 'class' => 'form-horizontal panel']) !!}
							<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
								{!! Form::label('nom','Nom du tutoriel') !!}
							  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom du tutoriel']) !!}
							  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
							</div>

							<div class="form-group {!! $errors->has('niveau_id') ? 'has-error' : '' !!}">
								{!! Form::label('niveau_id','niveau du tutoriel') !!}
							  	{!! Form::select('niveau_id',$niveaus,null, ['class' => 'form-control', 'placeholder' => '']) !!}
							  	{!! $errors->first('niveau_id', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
								{!! Form::label('description','Description du tutoriel') !!}
							  	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '....................']) !!}
							  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('introduction') ? 'has-error' : '' !!}">
								{!! Form::label('introduction','Introduction du tutoriel') !!}
							  	{!! Form::textarea('introduction', null, ['class' => 'form-control textarea', 'placeholder' => '....................']) !!}
							  	{!! $errors->first('introduction', '<small class="help-block">:message</small>') !!}
							</div>
							
							<div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
								{!! Form::label('image_fichier','Image du tutoriel') !!}
							  	{!! Form::file('image_fichier', null, ['class' => 'form-control']) !!}
							  	{!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
							</div>

							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<a href="javascript:history.back()" class="btn btn-primary">
					<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
				</a>
			</div>
	</div>
	@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
	@endsection
@stop
