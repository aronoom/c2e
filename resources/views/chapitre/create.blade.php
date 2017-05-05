	{!! Form::open(['url' => 'chapitre', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
							  	{!! Form::text('nom', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Nom du chapitre']) !!}
							  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
							  	{!! Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'description du chapitre']) !!}
							  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
							</div>
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}