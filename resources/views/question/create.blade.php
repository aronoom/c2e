 						<div class="col-sm-12">
							{!! Form::open(['url' => 'question', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							
							<div class="form-group {!! $errors->has('phrase') ? 'has-error' : '' !!}">
							  	{!! Form::textarea('phrase', null, ['class' => 'form-control', 'placeholder' => '.......']) !!}
							  	{!! $errors->first('phrase', '<small class="help-block">:message</small>') !!}
							</div>

							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}
						</div>
