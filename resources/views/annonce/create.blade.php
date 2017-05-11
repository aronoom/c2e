@extends('base')

@section('contenu')
<div class="row justify-content-md-center">
		    <div class="col-sm-12">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création de l'annonce</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							{!! Form::open(['url' => 'annonce', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
								{!! Form::label('titre','titre') !!}
							  	{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => "titre de l'annonce"]) !!}
							  	{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('text') ? 'has-error' : '' !!}">
								{!! Form::label('text',"Déscription de l'annonce") !!}
							  	{!! Form::textarea('text', null, ['style'=>'width: 100%;','class' => 'form-control textarea', 'placeholder' => '...........']) !!}
							  	{!! $errors->first('text', '<small class="help-block">:message</small>') !!}
							</div>
							
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<a class="row" href="javascript:history.back()" class="btn btn-primary">
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