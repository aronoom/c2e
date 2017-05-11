@extends('base')

@section('contenu')
<div class="row">
		    <div class="justify-content-md-center col-sm-4 col-sm-offset-4">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création du domaine</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							{!! Form::Model($domain,['route' => ['domain.update',$domain->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}	
						<div class="form-group {!! $errors->has('terme') ? 'has-error' : '' !!}">
								{!! Form::label('terme','terme du catégorie') !!}
							  	{!! Form::text('terme', null, ['class' => 'form-control', 'placeholder' => 'terme']) !!}
							  	{!! $errors->first('terme', '<small class="help-block">:message</small>') !!}
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
@stop