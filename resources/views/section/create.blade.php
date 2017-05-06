	{!! Form::open(['url' => 'section', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
							  	{!! Form::text('titre', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Nom du section']) !!}
							  	{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
							  	{!! Form::textarea('contenu', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Contenu du section']) !!}
							  	{!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
							</div>
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}